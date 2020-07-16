<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ExhibitorController extends Controller
{
    public function show($id)
    {
        $user   = User::findOrFail($id);


        $data   = [
            'exhibitor' => $user,
        ];

        return view('front.exhibitor.show', $data);
    }
}
