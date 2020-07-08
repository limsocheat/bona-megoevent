<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting    = setting()->all();

        $data       = [
            'setting'   => $setting,
        ];

        return view('admin.setting.index', $data);
    }

    public function update(Request $request) 
    {
        $data   = $request->all();

        setting()->set($data);
        setting()->save();

        return redirect()->back();
    }
    
}
