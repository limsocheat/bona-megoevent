<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('front.manage.profile.index', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user   = Auth::user();
        $id     = $user->id;

        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);

        $data       = $request->except('password');

        if ($request->input('password')) {
            $request->validate([
                'password'  => 'required|min:8'
            ]);

            $data['password']   = bcrypt($request->input('password'));
        }

        $user->update($data);

        if ($user) {
            return redirect()->route('manage.profile.index');
        }
    }
}
