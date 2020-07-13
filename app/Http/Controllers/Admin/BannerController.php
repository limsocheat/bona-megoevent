<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners  = Banner::select('*')->get();
        return view('admin.banner.index', [
            'banners'   => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            // 'image'     => 'required | mimes:jpeg,jpg,png | max:1000'

        ]);
        $data  = $request->all();

        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('uploads'), $imageName);

            $data['image'] = "/uploads/" . $imageName;
        }

        $banner = Banner::create($data);
        if ($banner) {
            return redirect()->route('admin.banner.index');
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
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', ['banner' => $banner]);
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
        $banner = Banner::findOrFail($id);

        $request->validate([
            'name'      => 'required',
            // 'image'     => 'required | mimes:jpeg,jpg,png | max:1000'

        ]);

        $data       = $request->all();
        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('uploads'), $imageName);

            $data['image'] = "/uploads/" . $imageName;
        }


        $banner->update($data);

        if ($banner) {
            return redirect()->route('admin.banner.index');
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

        $banner   = Banner::findOrFail($id);
        $banner->delete();

        if ($banner) {
            return redirect()->route('admin.banner.index');
        }
    }
}
