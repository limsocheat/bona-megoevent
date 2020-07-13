<?php

namespace App\Http\Controllers\Front;

use App\EventProduct;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventProductController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $request->validate([
            'product_id'    => 'required',
        ]);

        DB::beginTransaction();
        try {
            $product_id     = $request->input('product_id');
            $product        = Product::findOrFail($product_id);
            $event          = Event::findOrFail($id);

            if (!$event->products->contains($product->id)) {
                $event->products()->attach(
                    $product->id,
                    ['quantity' => 1, 'price' => $product->price]
                );
            } else {
                $event_product  = EventProduct::where('event_id', $event->id)->where('product_id', $product->id)->first();
                $event->products()->updateExistingPivot($product, ['quantity' => $event_product->quantity + 1], false);
            }

            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
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
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'product_id'    => 'required',
        ]);

        DB::beginTransaction();
        try {
            $product_id     = (int) $request->input('product_id');
            $event          = Event::findOrFail($id);
            $event->products()->detach($product_id);

            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
