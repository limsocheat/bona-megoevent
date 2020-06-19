<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\EventPurchased;
use App\Mail\EventTicket;
use App\Mail\TicketGenerated;
use App\Models\Event;
use App\Models\Purchase;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user       = auth()->user();

        $purchases  = Purchase::select('*')->where('user_id', $user->id)->get();

        $data       = [
            'purchases' => $purchases,
        ];

        return view('front.manage.purchase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'event_id'  => 'required|exists:events,id',
            'quantity'  => 'required|min:1|numeric',
            'profile'   => 'required'
        ]);

        DB::beginTransaction();
        try {
            $user           = auth()->user();
            $profile        = $request->input('profile');

            $user->profile()->updateOrCreate([], $profile);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase       = Purchase::findOrFail($id);

        $data           = [
            'purchase'  => $purchase,
        ];

        return view('front.manage.purchase.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
