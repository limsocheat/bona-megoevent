<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\Option;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


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
    public function create()
    {
        $data  = [
            'event_experiences' => Option::select('id', 'name')->where('type', 'event_experience')->get()->pluck('name', 'id'),
            'event_teams' => Option::select('id', 'name')->where('type', 'event_team')->get()->pluck('name', 'id'),
            'event_frequencies' => Option::select('id', 'name')->where('type', 'event_frequency')->get()->pluck('name', 'id'),
            'event_frequencies' => Option::select('id', 'name')->where('type', 'event_frequency')->get()->pluck('name', 'id'),
            'event_attendances' => Option::select('id', 'name')->where('type', 'event_attendance')->get()->pluck('name', 'id'),
            'event_locations' => Option::select('id', 'name')->where('type', 'event_location')->get()->pluck('name', 'id'),
            'types' => EventType::select('id', 'name')->get()->pluck('name', 'id'),
            'categories' => EventCategory::select('id', 'name')->get()->pluck('name', 'id'),
        ];

        return view('front.event.create', $data);
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
            'name'                  => 'required',
            'type_id'               => 'required|exists:event_types,id',
            'category_id'           => 'required|exists:event_categories,id',
            'event_experience_id'   => 'required|exists:options,id',
            'event_team_id'         => 'required|exists:options,id',
            'event_frequency_id'    => 'required|exists:options,id',
            'event_attendance_id'   => 'required|exists:options,id',
            'event_location_id'     => 'required|exists:options,id',
        ]);

        $data       = $request->all();

        $event      = Event::create($data);
        if ($event) {
            return redirect()->route('home');
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
    public function edit($id)
    {
        $event  = Event::findOrFail($id);

        $data  = [
            'event' => $event,
            'event_experiences' => Option::select('id', 'name')->where('type', 'event_experience')->get()->pluck('name', 'id'),
            'event_teams' => Option::select('id', 'name')->where('type', 'event_team')->get()->pluck('name', 'id'),
            'event_frequencies' => Option::select('id', 'name')->where('type', 'event_frequency')->get()->pluck('name', 'id'),
            'event_frequencies' => Option::select('id', 'name')->where('type', 'event_frequency')->get()->pluck('name', 'id'),
            'event_attendances' => Option::select('id', 'name')->where('type', 'event_attendance')->get()->pluck('name', 'id'),
            'event_locations' => Option::select('id', 'name')->where('type', 'event_location')->get()->pluck('name', 'id'),
            'types' => EventType::select('id', 'name')->get()->pluck('name', 'id'),
            'categories' => EventCategory::select('id', 'name')->get()->pluck('name', 'id'),
        ];

        return view('front.event.edit', $data);
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
        $event  = Event::findOrFail($id);
        $request->validate([
            'name'                  => 'required',
            'type_id'               => 'required|exists:event_types,id',
            'category_id'           => 'required|exists:event_categories,id',
            'event_experience_id'   => 'required|exists:options,id',
            'event_team_id'         => 'required|exists:options,id',
            'event_frequency_id'    => 'required|exists:options,id',
            'event_attendance_id'   => 'required|exists:options,id',
            'event_location_id'     => 'required|exists:options,id',
        ]);

        $data       = $request->all();
        $event->update($data);
        if ($event) {
            return redirect()->route('home');
        }
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
