<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventSchedule;
use App\Models\EventType;
use App\Models\Location;
use App\Models\Option;
use App\Models\Venue;
use App\Models\Video;
use Carbon\CarbonPeriod;
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
    public function index(Request $request)
    {
        $organizer  = auth()->user();
        
        $name       = $request->input('name');
        $status     = $request->input('status');
        $payment    = $request->input('payment');

        $events     = Event::select('*')
            ->when($name, function($query, $name){
                return $query->where('name', 'LIKE', "%$name%");
            })
            ->when($status, function($query, $status) {
                return $query->where('status', $status);
            })
            ->when($payment == 'paid', function($query) {
                return $query->whereHas('payment');
            })
            ->when($payment == 'unpaid', function($query) {
                return $query->whereDoesntHave('payment');
            })
            ->where('organizer_id', $organizer->id)
            ->get();

        $data       = [
            'events'    => $events,
        ];

        return view('front.manage.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data  = [
            'event_experiences'   => Option::select('id', 'name')->where('type', 'event_experience')->get()->pluck('name', 'id'),
            'event_teams'         => Option::select('id', 'name')->where('type', 'event_team')->get()->pluck('name', 'id'),
            'event_frequencies'   => Option::select('id', 'name')->where('type', 'event_frequency')->get()->pluck('name', 'id'),
            'event_frequencies'   => Option::select('id', 'name')->where('type', 'event_frequency')->get()->pluck('name', 'id'),
            'event_attendances'   => Option::select('id', 'name')->where('type', 'event_attendance')->get()->pluck('name', 'id'),
            'event_locations'     => Location::select('id', 'name')->get()->pluck('name', 'id'),
            'types'               => EventType::select('id', 'name')->get()->pluck('name', 'id'),
            'categories'          => EventCategory::select('id', 'name')->get()->pluck('name', 'id'),
            'venues'              => Venue::select('id','size')->get()->pluck('size', 'id'),
            
        ];

        return view('front.manage.event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organizer      = auth()->user();
        $request->validate([
            'name'                  => 'required',
            'type_id'               => 'required|exists:event_types,id',
            'category_id'           => 'required|exists:event_categories,id',
            'location_id'           => 'required|exists:locations,id',
            'start_date'            => 'required',
            'start_time'            => 'required',
            'end_date'              => 'required',
            'end_time'              => 'required',
        ]);


        $data                       = $request->all();
        $data['organizer_id']       = $organizer->id;

        if ($image   = $request->file('image')) {
            $name   = $image->getClientOriginalName();
            $name   = time() . '_' . $name;
            $image->move('uploads', $name);
            $data['image'] = '/uploads/' . $name;
        }
        if ($image   = $request->file('floor_plan_image')) {
            $name   = $image->getClientOriginalName();
            $name   = time() . '_' . $name;
            $image->move('uploads', $name);
            $data['floor_plan_image'] = '/uploads/' . $name;
        }

        $event       = Event::create($data);

        // SCHEDULE
        $period = CarbonPeriod::create($data['start_date'], $data['end_date']);
        // Iterate over the period
        foreach ($period as $date) {
            $event->schedules()->save(
                new EventSchedule([
                    'date'          => $date,
                    'start_time'    => $data['start_time'],
                    'end_time'      => $data['end_time'],
                ])
            );
        }

        // BANNER
        $banners    = [];
        if ($files  = $request->file('images')) {

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('upload', $name);
                $images[] = $name;

                $banners[] = new Banner([
                    'name'      => $event->name,
                    'location'  => 'event',
                    'image'     => $name,
                ]);
            }
        }

        if (count($banners)) {
            $event->banners()->saveMany($banners);
        }

        // VIDEO
        $event->videos()->delete();
        $videos     = [];
        foreach ($request->videos as $video) {
            if ($video) {
                $videos[] = new Video([
                    'url'   => $video,
                ]);
            }
        }

        if (count($videos)) {
            $event->videos()->saveMany($videos);
        }

        if ($event) {
            return redirect()->route('manage.event.index');
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
            'event_locations'   => Location::select('id', 'name')->get()->pluck('name', 'id'),
            'types' => EventType::select('id', 'name')->get()->pluck('name', 'id'),
            'categories' => EventCategory::select('id', 'name')->get()->pluck('name', 'id'),
        ];

        return view('front.manage.event.edit', $data);
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
            'location_id'           => 'required|exists:locations,id',
        ]);

        $data       = $request->all();

        if ($image   = $request->file('image')) {
            $name   = $image->getClientOriginalName();
            $name   = time() . '_' . $name;
            $image->move('uploads', $name);
            $data['image'] = '/uploads/' . $name;
        }

        if ($image   = $request->file('floor_plan_image')) {
            $name   = $image->getClientOriginalName();
            $name   = time() . '_' . $name;
            $image->move('uploads', $name);
            $data['floor_plan_image'] = '/uploads/' . $name;
        }

        $event->update($data);

        if (count($event->banners)) {
            $event->banners()->whereNotIn('id', $request->input('old'))->delete();
        }

        $banners    = [];
        if ($files = $request->file('images')) {

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('upload', $name);
                $images[] = $name;

                $banners[] = new Banner([
                    'name'      => $event->name,
                    'location'  => 'event',
                    'image'     => $name,
                ]);
            }
        }

        if (count($banners)) {
            $event->banners()->saveMany($banners);
        }

        $event->videos()->delete();
        $videos     = [];
        foreach ($request->videos as $video) {
            if ($video) {
                $videos[] = new Video([
                    'url'   => $video,
                ]);
            }
        }

        if (count($videos)) {
            $event->videos()->saveMany($videos);
        }

        if ($event) {
            return redirect()->route('manage.event.index');
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
