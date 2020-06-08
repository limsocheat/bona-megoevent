<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides =Slide::select('*')->get();

        return view('admin.slide.index',[
            'slides' => $slides
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
            'title'      => 'required',
            // 'image'     => 'required | mimes:jpeg,jpg,png | max:1000'
            
        ]);
          $data  = $request->all();

          if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('upload'), $imageName);

            $data['image'] = "/upload/".$imageName;
        }
        $banner = Slide::create($data);
        if($banner){
            return redirect()->route('admin.slide.index');
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
        $slide =Slide::findOrFail($id);
             return view('admin.slide.edit',[
                 'slide' => $slide
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
        $slide = Slide::findOrFail($id);

        $request->validate([
            'title'      => 'required',
            // 'image'     => 'required | mimes:jpeg,jpg,png | max:1000'
            
        ]);

        $data       = $request->all();
        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('upload'), $imageName);

            $data['image'] = "/upload/".$imageName;
        }


        $slide->update($data);

        if ($slide) {
            return redirect()->route('admin.slide.index');
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
         $banner   = Slide::findOrFail($id);
        $banner->delete();

        if ($banner) {
            return redirect()->route('admin.slide.index');
        }
    }
}
