<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user           = auth()->user();
        $items = \Cart::session($user->id)->getContent();

        // dd($items);

        $data   = [
            'items' => $items
        ];
        return view('front.product.cart.index', $data);
    }

    public function add(Request $request, $id)
    {
        $user           = auth()->user();
        $product        = Product::findOrFail($id);

        try {
            \Cart::session($user->id)->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));

            return redirect()->route('cart.index');
        } catch(\Exception $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id) 
    {

        $request->validate([
            'quantity'  => 'required'
        ]);

        $quantity       = (int) $request->input('quantity');

        $user           = auth()->user();

        try {
            \Cart::session($user->id)->update($id,[
                'quantity' =>  array(
                    'relative' => false,
                    'value' => $quantity
                ),
            ]);
            return redirect()->route('card.index');
        }
        catch(\Exception $e) {
            return redirect()->back();
        }
        
    }

    public function remove($id) {
        $user           = auth()->user();
        try {
            \Cart::session($user->id)->remove($id);

            return redirect()->route('card.index');
        }
        catch(\Exception $e) {
            return redirect()->back();
        }
    }
}
