<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets  = Widget::select('*')->get();
        return view('admin.widget.index', ['widgets' => $widgets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.widget.create');
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
            'name'          => 'required',
            'body'          => 'required',
            'location'      => 'required',
        ]);
        DB::beginTransaction();
        try {
            $data       = $request->all();
            Widget::create($data);
            DB::commit();
            return redirect()->route('admin.widget.index');
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
        $widget   = Widget::findOrFail($id);

        return view('admin.widget.edit', ['widget' => $widget]);
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
        $widget   = Widget::findOrFail($id);

        $request->validate([
            'name'          => 'required',
            'body'          => 'required',
            'location'      => 'required',
        ]);
        DB::beginTransaction();
        try {
            $data   = $request->all();
            $widget   = $widget->update($data);
            DB::commit();
            return redirect()->route('admin.widget.index');
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
        $widget   = Widget::findOrFail($id);
        DB::beginTransaction();
        try {
            $widget->delete();
            DB::commit();
            return redirect()->route('admin.widget.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
