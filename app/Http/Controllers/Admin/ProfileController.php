<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        
        return view('admin.profile.index', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user   = Auth::user();
        $id     = $user->id;

        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);

        DB::beginTransaction();
        try {
            $data       = $request->except('password');

            if ($request->input('password')) {
                $request->validate([
                    'password'  => 'required|min:8'
                ]);
                $data['password']   = bcrypt($request->input('password'));
            }
            $user->update($data);
            DB::commit();
            return redirect()->route('admin.profile.index');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
