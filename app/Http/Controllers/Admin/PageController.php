<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages  = Page::select('*')->get();
        return view('admin.page.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'slug'          => 'required|unique:pages,slug',
            'title'         => 'required|unique:pages,title',
            'description'   => 'required',
        ]);
        DB::beginTransaction();
        try {
            $data       = $request->all();
            Page::create($data);
            DB::commit();
            return redirect()->route('admin.page.index');
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
        $page   = Page::findOrFail($id);

        return view('admin.page.edit', ['page' => $page]);
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
        $page   = Page::findOrFail($id);

        $request->validate([
            'slug'          => 'required|unique:pages,slug,' . $id,
            'title'         => 'required|unique:pages,title,' . $id,
            'description'   => 'required'
        ]);
        DB::beginTransaction();
        try{
            $data   = $request->all();
            $page   = $page->update($data);
            DB::commit();
            return redirect()->route('admin.page.index');
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
        
        $page   = Page::findOrFail($id);
        DB::beginTransaction();
        try{
            $page->delete();
            DB::commit();
            return redirect()->route('admin.page.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
       
    }
}
