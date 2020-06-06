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

Auth::routes();

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
                    'banner'    => 'BannerController'
                ]);
            });
        });
    });
});

Route::namespace('Front')->group(function () {
    Route::get('/', 'PageController@index');
    Route::get('/entrance', 'PageController@entrance');
    Route::get('/upcoming','PageController@upcoming');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::resources([
        'company'   => 'CompanyController',
        'event' => 'EventController',
    ]);
});
