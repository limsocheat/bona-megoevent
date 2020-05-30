<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users      = User::select('*')->get();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles      = Role::select('*')->get()->pluck('name', 'name');

        return view('admin.user.create', [
            'roles' => $roles
        ]);
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
            'role'  => 'required'
        ]);

        $data       = $request->except('password');
        $data['password']   = bcrypt($request->input('password'));

        $user = User::create($data);
        $user->assignRole($request->input('role'));

        if ($user) {
            return redirect()->route('admin.user.index');
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
        $user   = User::findOrFail($id);

        return view('admin.user.edit', ['user' => $user]);
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
            'email' => 'required|unique:users,email,' . $id
        ]);

        $user   = User::findOrFail($id);

        $data       = $request->except('password');

        if ($request->input('password')) {
            $request->validate([
                'password'  => 'required|min:8'
            ]);

            $data['password']   = bcrypt($request->input('password'));
        }

        $user->update($data);

        if ($user) {
            return redirect()->route('admin.user.index');
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
        $user   = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()->route('admin.user.index');
        }
    }
}
