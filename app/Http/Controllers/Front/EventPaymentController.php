<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\ExpressCheckout;

class EventPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'event_id'  => 'required|exists:events,id'
        ]);

        $event_id   = $request->input('event_id');
        $event      = Event::findOrFail($event_id);

        $data       = [
            'event' => $event,
        ];

        return view('front.manage.event.payment.create', $data);
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
            'event_id'  => 'required|exists:events,id'
        ]);

        DB::beginTransaction();
        try {

            $event_id       = $request->input('event_id');
            $event          = Event::findOrFail($event_id);
            $provider       = new ExpressCheckout();

            $event_payment  = $event->payment()->save(
                new EventPayment([
                    'total' => $event->total_final_price,
                ])
            );

            $name           = $event->name;
            $price          = $event->total_final_price;
            $description    = 'Event Organizer Fee';
            $quantity       = 1;

            $data           = [];
            $data['items']  = [
                [
                    'name'  => $name,
                    'price' => $price,
                    'desc'  => $description,
                    'qty'   => $quantity,
                ],
            ];
            $data['invoice_id'] = time() . $event->id;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";

            $total = 0;
            foreach ($data['items'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
            $data['total'] = $total;
            $data['return_url'] = url("/manage/event_payment/$event_payment->id/edit");
            $data['cancel_url'] = url('/manage/event_payment/cancel');
            $response = $provider->setExpressCheckout($data);
            
            DB::commit();
            return redirect($response['paypal_link']);
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
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
    public function edit(Request $request, $id)
    {
        $request->validate([
            'token'     => 'required',
            'PayerID'   => 'required'
        ]);

        DB::beginTransaction();
        try {
            $provider       = new ExpressCheckout();
            $token          = $request->input('token');
            $payer_id       = $request->input('PayerID');

            $event_payment  = EventPayment::findOrFail($id);
            $event          = Event::findOrFail($event_payment->event_id);

            $name           = $event->name;
            $price          = $event->total_final_price;
            $description    = 'Event Organizer Fee';
            $quantity       = 1;

            $data           = [];
            $data['items']  = [
                [
                    'name'  => $name,
                    'price' => $price,
                    'desc'  => $description,
                    'qty'   => $quantity,
                ],
            ];
            $data['invoice_id'] = time() . $event->id;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";

            $total = 0;
            foreach ($data['items'] as $item) {
                $total += $item['price'] * $item['qty'];
            }
            $data['total'] = $total;
            $provider->doExpressCheckoutPayment($data, $token, $payer_id);

            $event_payment->update([
                'status'    => 'paid'
            ]);
            $event->update([
                'status'    => 'published'
            ]);

            DB::commit();
            return redirect()->route('manage.event.index');
        } catch(\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
