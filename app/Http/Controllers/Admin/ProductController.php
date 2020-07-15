<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Utils\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    
    protected $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

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

        DB::beginTransaction();
        try {
            $data  = $request->all();
            if ($request->file('new_image')) {
                $data['image'] = $this->uploader->uploadImage($request->file('new_image'));
            }
            Product::create($data);
            DB::commit();
            return redirect()->route('admin.product.index');
         } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
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
        
        $product = Product::findOrFail($id);
        $request->validate([
            'name'      => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data   = $request->all(); 

            if ($request->file('new_image')) {
                $data['image'] = $this->uploader->uploadImage($request->file('new_image'));
            }
            $product->update($data);
            DB::commit();
            return redirect()->route('admin.product.index');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
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
         DB::beginTransaction();
        try {
            $product->delete();
            DB::commit();
            return redirect()->route('admin.product.index');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
