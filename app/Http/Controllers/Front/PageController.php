<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventType;
use App\Models\Exhibitor;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\Slide;
use App\User;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;


class PageController extends Controller
{
    public function index()
    {
        $data = [
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'events'            => Event::select('*')->limit(8)->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'exhibitors'        => User::isExhibitored()->get(),
            'slides'            => Slide::select('*')->where('location', 'homepage')->get(),

        ];

        return view('front.index', $data);
    }

    public function entrance()
    {
        $data = [
            'entrances' => Slide::select('*')->where('location', 'entrance')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
        ];

        return view('front.entrance', $data);
    }

    public function upcoming()
    {
        $data = [
            'categories'        => EventCategory::select('*')->get(),
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'events'            => Event::select('*')->published()->get(),
        ];

        return view('front.upcoming', $data);
    }



    public function search(Request $request)
    {

        $keyword    = $request->input('keyword');
        $category   = $request->input('category');
        $type       = $request->input('type');
        $dates      = explode(' - ', $request->input('date'));

        $start_date = null;
        $end_date   = null;

        if (count($dates) >= 2) {
            $start_date = explode(' - ', $request->input('date'))[0];
            $end_date   = explode(' - ', $request->input('date'))[1];
        }


        $events     = Event::select('*')
            ->when($keyword, function ($query, $keyword) {
                return $query->where('name', 'LIKE', "%$keyword%");
            })
            ->when($category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($type, function ($query, $type) {
                return $query->where('type_id', $type);
            })
            ->when($start_date, function ($query, $start_date) {
                return $query->whereDate('start_date', '>=', date('Y-m-d', strtotime($start_date)));
            })
            ->when($end_date, function ($query, $end_date) {
                return $query->whereDate('end_date', '<=', date('Y-m-d', strtotime($end_date)));
            })
            ->published()
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

    public function contact()
    {
        return view('front.contact');
    }

    public function submitContact(Request $request)
    {

        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $data         = $request->all();
        $contact = Contact::create($data);
        if ($contact) {
            return redirect(route('contact'))->with('success', 'Submit Successfully!');
        }
    }

    public function manage()
    {
        return view('front.manage.index');
    }

    public function events(Request $request)
    {

        $data = [
            'event_categories'  => EventCategory::select('id', 'name')->pluck('name', 'id'),
            'event_types'       => EventType::select('id', 'name')->pluck('name', 'id'),
            'events'            => Event::select('*')->get(),
            'feature_events'    => Event::select('*')->inRandomOrder()->limit(4)->get(),
            'exhibitors'        => User::isExhibitored()->get(),
            'categories'        => EventCategory::select('*')->get(),
        ];

        return view('front.event.index', $data);
    }

    public function event(Request $request, $id)
    {
        $event      = Event::findOrFail($id);
        $data       = [
            'entrances'         => Slide::select('*')->where('location', 'entrance')->get(),
            'feature_events'    => Event::select('*')->published()->upcoming()->inRandomOrder()->limit(4)->get(),
            'next_events'       => Event::select('*')->published()->upcoming()->inRandomOrder()->limit(2)->get(),
            'event'             => $event,
        ];

        return view('front.event.show', $data);
    }

    public function exhibitor_registration(Request $request, $name)
    {

        $event      = Event::where('name', $name)->first();
        $user       = auth()->user();

        $data       = [
            'event' => $event,
            'user'  => $user,
        ];

        return view('front.event.exhibitor_registration', $data);
    }

    public function cart(Request $request, $name)
    {
        $request->validate([
            'quantity'   => 'required|min:1|numeric'
        ]);

        $event      = Event::where('name', $name)->first();
        $quantity   = $request->input('quantity');
        $price      = $event->price;

        if (strtotime($event->early_bird_date) > strtotime(date('Y-m-d'))) {
            $price  = $event->early_bird_price;
        }

        if ($quantity >= $event->group_min_pax) {
            $price  = $event->group_price;
        }

        $data       = [
            'event'     => $event,
            'quantity'   => $quantity,
            'price'     => $price,
            'subtotal'  => $quantity * $price,
        ];

        return view('front.cart.index', $data);
    }
    public function checkout(Request $request, $id)
    {
        $request->validate([
            'quantity'   => 'required|min:1|numeric'
        ]);

        $user           = auth()->user();
        $user           = User::with('profile')->findOrFail($user->id);

        $event          = Event::findOrFail($id);
        $quantity       = $request->input('quantity');
        $price          = $event->price;
        if ($quantity >= $event->group_min_pax) {
            $price      = $event->group_price;
        }

        if (strtotime($event->early_bird_date) < strtotime(date('Y-m-d'))) {
            $price      = $event->early_bird_price;
        }

        $token          = $request->input('token');
        $payer_id       = $request->input('PayerID');
        if ($token && $payer_id) {
            $provider   = new ExpressCheckout();
            $name       = $event->name;
            $description = $event->description;
            $data = [];
            $data['items'] = [
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
            $response = $provider->doExpressCheckoutPayment($data, $token, $payer_id);
            if ($response) {
                return redirect()->route('manage.purchase.store')->withInput([
                    'event_id'  => $event->id,
                    'quantity'  => $quantity,
                ]);
            }
        }

        $data           = [
            'user'      => $user,
            'event'     => $event,
            'quantity'  => $quantity,
            'price'     => $price,
            'subtotal'  => $quantity * $price,
        ];

        return view('front.checkout.index', $data);
    }
    public function products(Request $request)
    {

        $name       = $request->input('name');
        $category   = $request->input('category');
        $products   = Product::select('*')
            ->when($name, function ($query, $name) {
                return $query->where('name', 'LIKE', "%$name%");
            })
            ->when($category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->limit(12)
            ->get();

        $data = [
            'products'            => $products,
            'product_categories'  => ProductCategory::select('id', 'name')->pluck('name', 'id'),
        ];
        return view('front.product', $data);
    }
    public function product(Request $request, $id)
    {

        $product      = Product::findOrFail($id);

        $data       = [
            'product_categories'  => ProductCategory::select('id', 'name')->pluck('name', 'id'),
            'product'             => $product,
        ];

        return view('front.components.product.show', $data);
    }
}
