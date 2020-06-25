<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\Location;
use App\Models\Option;
use App\Models\Video;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::select('*')
            ->with('type:id,name', 'category:id,name', 'organizers:id,name')
            ->get();
        return view('admin.event.index', [
            'events' => $events
        ]);
    }
    

    public function purchases(Request $request, $id)
    {
        $event          = Event::findOrFail($id);
        $purchases      = $event->purchases;
        $data           = [
            'purchases' => $purchases
        ];

        return view('admin.event.purchases', $data);
    }

    public function tickets(Request $request, $id)
    {
        $event          = Event::findOrFail($id);
        $tickets        = $event->tickets;
        $data           = [
            'tickets' => $tickets
        ];

        return view('admin.event.tickets', $data);
    }

    public function exhibitors(Request $request, $id)
    {
        $event          = Event::findOrFail($id);
        $exhibitors     = $event->exhibitors;
        $data           = [
            'exhibitors' => $exhibitors
        ];

        return view('admin.event.exhibitors', $data);
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
            'event_locations' => Location::select('id', 'name')->get()->pluck('name', 'id'),
            'types' => EventType::select('id', 'name')->get()->pluck('name', 'id'),
            'categories' => EventCategory::select('id', 'name')->get()->pluck('name', 'id'),
        ];
        return view('admin.event.create', $data);
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

        if($image   = $request->file('image')) {
            $name   = $image->getClientOriginalName();
            $name   = time().'_'.$name;
            $image->move('uploads', $name);
            $data['image'] = '/uploads/'.$name;
        }

        $event                      = Event::create($data);

        $banners    = [];
        if($files= $request->file('images')){

            foreach($files as $file){
                $name= $file->getClientOriginalName();
                $file->move('upload', $name);
                $images[] = $name;

                $banners[] = New Banner([
                    'name'      => $event->name,
                    'location'  => 'event',
                    'image'     => $name,
                ]);
            }
        }

        if(count($banners)) {
            $event->banners()->saveMany($banners);
        }

        $event->videos()->delete();
        $videos     = [];
        foreach($request->videos as $video) {
            if($video) {
                $videos[] = new Video([
                    'url'   => $video,
                ]);
            }
        }

        if(count($videos)) {
            $event->videos()->saveMany($videos);
        }

        if ($event) {
            return redirect()->route('admin.event.index');
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

        return view('admin.event.edit', $data);
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

        if($image   = $request->file('image')) {
            $name   = $image->getClientOriginalName();
            $name   = time().'_'.$name;
            $image->move('uploads', $name);
            $data['image'] = '/uploads/'.$name;
        }

        $event->update($data);

        if(count($event->banners)) {
            $event->banners()->whereNotIn('id', $request->input('old'))->delete();
        }
  
        $banners    = [];
        if($files= $request->file('images')){

            foreach($files as $file){
                $name= $file->getClientOriginalName();
                $file->move('upload', $name);
                $images[] = $name;

                $banners[] = New Banner([
                    'name'      => $event->name,
                    'location'  => 'event',
                    'image'     => $name,
                ]);
            }
        }

        if(count($banners)) {
            $event->banners()->saveMany($banners);
        }

        $event->videos()->delete();
        $videos     = [];
        foreach($request->videos as $video) {
            if($video) {
                $videos[] = new Video([
                    'url'   => $video,
                ]);
            }
        }

        if(count($videos)) {
            $event->videos()->saveMany($videos);
        }

        if ($event) {
            return redirect()->route('admin.event.index');
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
