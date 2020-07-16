<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/login', 'AuthController@showLogin')->name('login');
            Route::middleware('role:administrator')->group(function () {
                Route::get('/', 'DashboardController@index')->name('index');
                Route::get('/profile', 'ProfileController@index')->name('profile.index');
                Route::put('/profile', 'ProfileController@update')->name('profile.update');

                Route::get('/setting', 'SettingController@index')->name('setting.index');
                Route::put('/setting', 'SettingController@update')->name('setting.update');

                Route::resources([
                    'user'               => 'UserController',
                    'category'           => 'CategoryController',
                    'type'               => 'TypeController',
                    'option'             => 'OptionController',
                    'exhibitor'          => 'ExhibitorController',
                    'event'              => 'EventController',
                    'page'               => 'PageController',
                    'banner'             => 'BannerController',
                    'slide'              => 'SlideController',
                    'purchase'           => 'PurchaseController',
                    'ticket'             => 'TicketController',
                    'location'           => 'LocationController',
                    'contact'            =>  'ContactController',
                    'product_category'   => 'ProductCategoryController',
                    'product'            => 'ProductController',
                    'booth_type'         => 'BoothTypeController',
                    'sales'              => 'SaleController',
                    'venue'              => 'VenueController',
                ]);

                Route::get('/event/{event}/purchases', 'EventController@purchases')->name('event.purchases');
                Route::get('/event/{event}/tickets', 'EventController@tickets')->name('event.tickets');
                Route::get('/event/{event}/exhibitors', 'EventController@exhibitors')->name('event.exhibitors');
            });
        });
    });
});

Route::namespace('Front')->group(function () {
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/upcoming', 'PageController@upcoming')->name('upcoming');
    Route::get('/search', 'PageController@search')->name('search');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::get('/product', 'PageController@products')->name('product');
    Route::post('/contact', 'PageController@submitContact')->name('contact.submit');

    Route::get('/event', 'PageController@events')->name('events');
    Route::get('/event/{event}', 'PageController@event')->name('event');

    Route::get('/exhibitor/{exhibitor}', 'ExhibitorController@show')->name('exhibitor.show');

    Route::get('product/{product}', 'PageController@product')->name('show.product');
    Route::middleware(['auth', 'verified'])->group(function () {

        // Cart
        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::post('/cart/add/{product}', 'CartController@add')->name('cart.add');
        Route::put('/cart/update/{row}', 'CartController@update')->name('cart.update');
        Route::delete('/cart/remove/{row}', 'CartController@remove')->name('cart.remove');
        Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
        Route::put('/checkout/paypal/submit', 'CheckoutController@paypal_submit')->name('checkout.paypal.submit');
        Route::get('/checkout/paypal/success', 'CheckoutController@paypal_success')->name('checkout.paypal.success');
        Route::get('/checkout/paypal/cancel', 'CheckoutController@paypal_cancel')->name('checkout.paypal.cancel');

        // Register Event
        Route::get('/event/{event}/cart', 'PageController@cart')->name('cart');
        Route::get('/event/{event}/checkout', 'PageController@checkout')->name('checkout');

        // Paypal Payment
        Route::post('/paypal/submit', 'PaypalController@submit')->name('paypal.submit');
        Route::get('/paypal/success', 'PaypalController@success')->name('paypal.success');
        Route::get('/paypal/cancel', 'PaypalController@cancel')->name('paypal.cancel');

        Route::get('/event/{event}/exhibitor_registration', 'PageController@exhibitor_registration')->name('event.exhibitor_registration');
        Route::post('/event/{event}/exhibitor_registration', 'ExhibitorRegistrationController@store')->name('event.exhibitor_registration');
        Route::post('/event/{event}/event_exhibitor', 'EventExhibitorController@store')->name('event_exhibitor.store');

        Route::post('/event/{event}/add_product', 'EventProductController@store')->name('event.event_product.add');
        Route::delete('/event/{event}/remove_product', 'EventProductController@destroy')->name('event.event_product.remove');

        // Manage 
        Route::prefix('manage')->group(function () {
            Route::name('manage.')->group(function () {
                Route::resources([
                    'company'             => 'CompanyController',
                    'event'               => 'EventController',
                    'purchase'            => 'PurchaseController',
                    'ticket'              => 'TicketController',
                    'order'               => 'OrderController',
                    'order_ticket'        => 'OrderTicketController',
                    'event_payment'       => 'EventPaymentController',
                ]);
                Route::get('/', 'PageController@manage')->name('index');
                Route::get('/profile', 'ProfileController@index')->name('profile.index');
                Route::put('/profile', 'ProfileController@update')->name('profile.update');
                Route::put('/re_password', 'ProfileController@re_password')->name('profile.re_password');

                Route::get('/event_exhibitor/{event}', 'EventExhibitorController@show')->name('event_exhibitor.show');
                Route::get('/sale/{sale}', 'SaleController@show')->name('sale.show');
            });
        });
    });
});
