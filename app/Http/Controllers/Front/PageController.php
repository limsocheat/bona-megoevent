<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\Exhibitor;
use App\Models\Slide;
use App\User;
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

    public function search(Request $request) {

        $keyword    = $request->input('keyword');
        $category   = $request->input('category');
        $type       = $request->input('type');
        $dates      = explode(' - ', $request->input('date'));

        $start_date = null;
        $end_date   = null;

        if(count($dates) >= 2) {
            $start_date = explode(' - ', $request->input('date'))[0];
            $end_date   = explode(' - ', $request->input('date'))[1];
        } 

        
        $events     = Event::select('*')
            ->when($keyword, function($query, $keyword) {
                return $query->where('name', 'LIKE', "%$keyword%");
            })
            ->when($category, function($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($type, function($query, $type) {
                return $query->where('type_id', $type);
            })
            ->when($start_date, function($query, $start_date) {
                return $query->whereDate('start_date', '>=', date('Y-m-d', strtotime($start_date)));
            })
            ->when($end_date, function($query, $end_date) {
                return $query->whereDate('end_date', '<=', date('Y-m-d', strtotime($end_date)));
            })
            ->get();

        $data = [
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'exhibitors'        => Exhibitor::select('*')->inRandomOrder()->limit(4)->get(),
            'events'            => $events,
        ];

        return view('front.search', $data);
    }
    public function contact(){
        return view('front.contact');
    }

    public function submitContact(Request $request) {

        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        return redirect(route('contact'))->with('success', 'submit successfully');
    }

    public function manage()
    {
        return view('front.manage.index');
    }

    public function events(Request $request) {

         $data = [
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'events'            => Event::select('*')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'exhibitors'        => Exhibitor::select('*')->inRandomOrder()->limit(4)->get(),
        ];

        return view('front.event.index', $data);
    }

    public function event(Request $request, $id) {
        $event      = Event::findOrFail($id);
        $data       = [
            'entrances'         => Slide::select('*')->where('location','entrance')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'event' => $event,
        ];

        return view('front.event.show', $data);
    }

    public function cart(Request $request, $id)
    {
        $request->validate([
            'quality'   => 'required|min:1|numeric'
        ]);

        $event      = Event::findOrFail($id);
        $quality    = $request->input('quality');
        $price      = $event->price;
        if($quality >= $event->group_min_pax) {
            $price  = $event->group_price;
        }

        if(strtotime($event->early_bird_date) < strtotime(date('Y-m-d'))) {
            $price  = $event->early_bird_price;
        }

        $data       = [
            'event'     => $event, 
            'quality'   => $quality,
            'price'     => $price,
            'subtotal'  => $quality * $price,
        ];

        return view('front.cart.index', $data);
    }
    public function checkout(Request $request, $id)
    {
        $request->validate([
            'quality'   => 'required|min:1|numeric'
        ]);

        $user       = auth()->user();
        $user       = User::with('profile')->findOrFail($user->id);

        $event      = Event::findOrFail($id);
        $quality    = $request->input('quality');
        $price      = $event->price;
        if($quality >= $event->group_min_pax) {
            $price  = $event->group_price;
        }

        if(strtotime($event->early_bird_date) < strtotime(date('Y-m-d'))) {
            $price  = $event->early_bird_price;
        }

        $data       = [
            'user'      => $user,
            'event'     => $event, 
            'quality'   => $quality,
            'price'     => $price,
            'subtotal'  => $quality * $price,
        ];

        return view('front.checkout.index', $data);
    }
    public function ticket(){
        return view('front.ticket.index');
    }
}
