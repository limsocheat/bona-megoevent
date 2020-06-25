<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventExhibitorController extends Controller
{
    public function store(Request $request, $id) 
    {
        $event      = Event::findOrFail($id);
        $user       = auth()->user();

        DB::beginTransaction();
        try {
            if(!$event->exhibitors->contains($user->id)) {
                $event->exhibitors()->attach([$user->id]);

                DB::commit();
                return redirect()->route('manage.profile.index');
            } 

            DB::rollback();
            return redirect()->back()->with('error', 'You already have application!');

        }catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
