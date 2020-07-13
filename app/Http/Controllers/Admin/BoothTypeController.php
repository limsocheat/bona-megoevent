<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoothType;
use Illuminate\Http\Request;

class BoothTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booth_types  = BoothType::select('*')->get();
        return view('admin.booth_type.index', [
            'booth_types'    => $booth_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booth_type.create');
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
            'name' => 'required|string|max:255'
        ]);
        $data         = $request->all();

        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('uploads'), $imageName);

            $data['image'] = "/uploads/" . $imageName;
        }

        $booth_type = BoothType::create($data);

        if ($booth_type) {
            return redirect()->route('admin.booth_type.index');
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
        $booth_type  = BoothType::findOrFail($id);
        return view('admin.booth_type.edit', [
            'booth_type' => $booth_type
        ]);
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
            'name'  => 'required',

        ]);
        $booth_type   = BoothType::findOrFail($id);
        $data       = $request->all();

        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('uploads'), $imageName);

            $data['image'] = "/uploads/" . $imageName;
        }

        $booth_type->update($data);

        if ($booth_type) {
            return redirect()->route('admin.booth_type.index');
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
        $booth_type   = BoothType::findOrFail($id);
        $booth_type->delete();

        if ($booth_type) {
            return redirect()->route('admin.booth_type.index');
        }
    }
}
