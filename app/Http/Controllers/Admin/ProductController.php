<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products   = Product::select('*')->get();
        return view('admin.product.index', [
            'products'  => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => ProductCategory::select('id', 'name')->get()->pluck('name', 'id'),
        ];
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',

        ]);
        $data  = $request->all();

        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('uploads'), $imageName);

            $data['image'] = "/uploads/" . $imageName;
        }
        $product = Product::create($data);
        if ($product) {
            return redirect()->route('admin.product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = [
            'product'  => Product::findOrFail($id),
            'categories' => ProductCategory::select('id', 'name')->get()->pluck('name', 'id'),

        ];
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'      => 'required',

        ]);

        $product = Product::findOrFail($id);



        $data       = $request->all();
        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('uploads'), $imageName);

            $data['image'] = "/uploads/" . $imageName;
        }


        $product->update($data);

        if ($product) {
            return redirect()->route('admin.product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product   = Product::findOrFail($id);
        $product->delete();

        if ($product) {
            return redirect()->route('admin.product.index');
        }
    }
}
