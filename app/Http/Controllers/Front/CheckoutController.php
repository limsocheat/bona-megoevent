<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $user           = auth()->user();
        $items = \Cart::session($user->id)->getContent();

        // dd($items);

        $data   = [
            'user'  => $user,
            'items' => $items
        ];

        return view('front.product.checkout.index', $data);
    }

    public function paypal_submit(Request $request)
    {
        $provider       = new ExpressCheckout(); 
        $cart           = \Cart::session(auth()->id());

        DB::beginTransaction();
        try {
            $data = [];
            $data['items']  = [];
            foreach($cart->getContent() as $key => $item) {
                $item_detail    = [
                    'name'      => $item->name,
                    'price'     => $item->price,
                    'qty'       => $item->quantity,
                ];

                $data['items'][] = $item_detail;
            }

            $data['invoice_id'] = time();
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = url("/checkout/paypal/success");
            $data['cancel_url'] = url('/checkout/paypal/cancel');

            $data['total']      = (float) $cart->getTotal();

            $response = $provider->setExpressCheckout($data);
            
            DB::commit();
            return redirect($response['paypal_link']);
        } catch(\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back();
        }
        
    }

    public function paypal_success(Request $request)
    {
        $request->validate([
            'token'     => 'required',
            'PayerID'   => 'required',
        ]);
        $cart           = \Cart::session(auth()->id());
        $user           = auth()->user();

        try {
            $provider = new ExpressCheckout; 
            $token      = $request->input('token');
            $payer_id   = $request->input('PayerID');

            
            $data = [];
            $data['items']  = [];
            foreach($cart->getContent() as $key => $item) {
                $item_detail    = [
                    'name'      => $item->name,
                    'price'     => $item->price,
                    'qty'       => $item->quantity,
                ];

                $data['items'][] = $item_detail;
            }

            $data['invoice_id'] = time();
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['total']      = (float) $cart->getTotal();

            $provider->getExpressCheckoutDetails($token);
            $provider->doExpressCheckoutPayment($data, $token, $payer_id);

            //Create Sale
            $sale       = $user->sales()->save(
                new Sale([
                    'description'   => time(),
                ])
            );
            // Create Sale Line
            foreach($cart->getContent() as $key => $item) {
                $sale->products()->attach($item['id'], [
                    'quantity'  => $item['quantity'],
                    'price'     => $item['price'],
                ]);
            }

            // Reset Cart
            $cart->clear();
            DB::commit();
            return redirect()->route('manage.purchase.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
