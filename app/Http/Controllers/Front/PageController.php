<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\Exhibitor;
use App\Models\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'events'            => Event::select('*')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'exhibitors'        => Exhibitor::select('*')->inRandomOrder()->limit(4)->get(),
            'slides'            => Slide::select('*')->where('location', 'homepage')->get(),
           
        ];

        return view('front.index', $data);
    }

    public function entrance()
    {
         $data = [
            'entrances' => Slide::select('*')->where('location','entrance')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
        ];
   
        return view('front.entrance', $data);
    }
    public function upcoming() {
     $data = [
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'events'            => Event::select('*')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'exhibitors'        => Exhibitor::select('*')->inRandomOrder()->limit(4)->get(),
        ];
   
        return view('front.upcoming',$data);
    }
}
