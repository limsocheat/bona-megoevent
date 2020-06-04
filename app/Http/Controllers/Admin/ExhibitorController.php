<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\User;
use Illuminate\Http\Request;

class ExhibitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibitors = Exhibitor::select('*')
            ->with('user:id,name,email')
            ->get();
        return view('admin.exhibitor.index', [
            'exhibitors' => $exhibitors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.exhibitor.create');
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
           
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $data       = $request->except('password', 'role');
        $data['password']   = bcrypt($request->input('password'));

        $user = User::create($data);
        $user->assignRole('exhibitor');

        $data  = $request->all();

        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('upload'), $imageName);

            $data['logo'] = "/upload/".$imageName;
        }

        $data['user_id'] = $user->id;

        $exhibitor = Exhibitor::create($data);

        if ($user && $exhibitor) {
            return redirect()->route('admin.exhibitor.index');
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
        $exhibitor = Exhibitor::findOrFail($id);
        return view('admin.exhibitor.edit', ['exhibitor' => $exhibitor]);
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
        $exhibitor = Exhibitor::findOrFail($id);



        $data       = $request->all();
        if ($request->file('new_image')) {
            $imageName = $request->file('new_image')->getClientOriginalName();
            request()->new_image->move(public_path('upload'), $imageName);

            $data['logo'] = "/upload/".$imageName;
        }


        $exhibitor->update($data);

        if ($exhibitor) {
            return redirect()->route('admin.exhibitor.index');
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
        $exhibitor   = Exhibitor::findOrFail($id);
        $exhibitor->delete();

        if ($exhibitor) {
            return redirect()->route('admin.exhibitor.index');
        }
    }
}
