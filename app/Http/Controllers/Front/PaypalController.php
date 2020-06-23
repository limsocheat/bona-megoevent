<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\EventPurchased;
use App\Mail\TicketGenerated;
use App\Models\Event;
use App\Models\Purchase;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    public function submit(Request $request)
    {

        $provider = new ExpressCheckout; 

        $request->validate([
            'event_id'  => 'required|exists:events,id',
            'quantity'  => 'required',
        ]);

        $event          = Event::findOrFail($request->input('event_id'));
        $quantity       = $request->input('quantity');
        $name           = $event->name;
        $price          = $event->price;
        $description    = $event->description;

        if (strtotime($event->early_bird_date) > strtotime(date('Y-m-d'))) {
            $price  = $event->early_bird_price;
        }

        if ($quantity >= $event->group_min_pax) {
            $price  = $event->group_price;
        }

        $data = [];
        $data['items'] = [
            [
                'name'  => $name,
                'price' => $price,
                'desc'  => $description,
                'qty'   => $quantity,
            ],
        ];

        $data['invoice_id'] = time().$event->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url("/paypal/success/?event_id=$event->id&quantity=$quantity");
        $data['cancel_url'] = url('/paypal/cancel');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;

        $response = $provider->setExpressCheckout($data);
        // dd($provider);
        return redirect($response['paypal_link']);
    }

    public function success(Request $request)
    {
        $request->validate([
            'event_id'  => 'required',
            'quantity'  => 'required',
            'token'     => 'required',
            'PayerID'   => 'required',
        ]);


        try {
            $provider = new ExpressCheckout; 
            $token      = $request->input('token');
            $payer_id   = $request->input('PayerID');

            $event          = Event::findOrFail($request->input('event_id'));
            $quantity       = $request->input('quantity');
            $name           = $event->name;
            $price          = $event->price;
            $description    = $event->description;

            if (strtotime($event->early_bird_date) > strtotime(date('Y-m-d'))) {
                $price  = $event->early_bird_price;
            }

            if ($quantity >= $event->group_min_pax) {
                $price  = $event->group_price;
            }

            $data = [];
            $data['items'] = [
                [
                    'name'  => $name,
                    'price' => $price,
                    'desc'  => $description,
                    'qty'   => $quantity,
                ],
            ];

            $data['invoice_id'] = time().$event->id;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";

            $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price'] * $item['qty'];
            }

            $data['total'] = $total;

            $response = $provider->getExpressCheckoutDetails($token);
            $response = $provider->doExpressCheckoutPayment($data, $token, $payer_id);

            // Process Ticket
            $user           = auth()->user();
            $profile        = $request->input('profile');
            if($profile) {
                $user->profile()->updateOrCreate([], $profile);
            }

            $data           = $request->all();
            $data['user_id'] = $user->id;
            $event          = Event::findOrFail($request->input('event_id'));
            $organizer      = $event->organizer;

            $purchase       = Purchase::create($data);
            if ($purchase) {
                //send email to organizer
                Mail::to($organizer)->send(new EventPurchased($purchase));
                for ($i = 0; $i < $purchase->quantity; $i++) {
                    $ticket = $purchase->tickets()->save(
                        new Ticket([
                            'code'  => time() . $i
                        ])
                    );

                    if ($ticket) {
                        //send email to participant
                        Mail::to($request->user())->send(new TicketGenerated($ticket));
                    }
                }
            }
            DB::commit();
            return redirect()->route('manage.purchase.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
