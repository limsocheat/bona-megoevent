<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function show($id)
    {

        $sale   = Sale::findOrFail($id);

        $data   = [
            'sale'  => $sale,
        ];

        return view('front.manage.sale.show', $data);
    }
}
