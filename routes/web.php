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

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->group(function () {
    Route::middleware('role:administrator')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/', 'DashboardController@index')->name('index');
                Route::get('/profile', 'ProfileController@index')->name('profile.index');
                Route::put('/profile', 'ProfileController@update')->name('profile.update');

                Route::resources([
                    'user'      => 'UserController',
                    'category'  => 'CategoryController',
                    'type'      => 'TypeController',
                    'option'    => 'OptionController',
                    'exhibitor' => 'ExhibitorController',
                    'event'     => 'EventController',
                    'page'      => 'PageController',
                    'banner'    => 'BannerController',
                    'slide'     => 'SlideController',
                    'purchase'  => 'PurchaseController',
                    'ticket'    => 'TicketController',
                    'location'  => 'LocationController'
                ]);
            });
        });
    });
});

Route::namespace('Front')->group(function () {
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/entrance', 'PageController@entrance')->name('entrance');
    Route::get('/upcoming', 'PageController@upcoming')->name('upcoming');
    Route::get('/search', 'PageController@search')->name('search');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::post('/contact', 'PageController@submitContact')->name('contact.submit');
    Route::get('/event', 'PageController@events')->name('events');
    Route::get('/event/{event}', 'PageController@event')->name('event');
    // Route::get('/ticket','PageController@ticket')->name('ticket');

    Route::get('/sendemail', 'SendEmailController@index');
    Route::post('/sendemail/send', 'SendEmailController@send');

    Route::middleware('auth')->group(function () {

        Route::get('/cart/{event}', 'PageController@cart')->name('cart');
        Route::get('/checkout/{event}', 'PageController@checkout')->name('checkout');
        Route::post('/paypal/submit', 'PaypalController@submit')->name('paypal.submit');
        Route::get('/paypal/success', 'PaypalController@success')->name('paypal.success');
        Route::get('/paypal/cancel', 'PaypalController@cancel')->name('paypal.cancel');

        Route::prefix('manage')->group(function () {
            Route::name('manage.')->group(function () {
                Route::resources([
                    'company'   => 'CompanyController',
                    'event'     => 'EventController',
                    'purchase'  => 'PurchaseController',
                    'ticket'    => 'TicketController',
                    'order'     => 'OrderController',
                    'order_ticket'  => 'OrderTicketController'
                ]);
                Route::get('/', 'PageController@manage');
                Route::get('/profile', 'ProfileController@index')->name('profile.index');
                Route::put('/profile', 'ProfileController@update')->name('profile.update');
            });
        });
    });
});
