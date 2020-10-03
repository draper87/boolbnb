<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
      ->namespace('Admin')
      ->middleware('auth')
      ->name('admin.')
      ->group(function () {
        Route::resource('apartments', 'ApartmentController');
        Route::get('/message', 'MessageController@index')->name('message');
        Route::get('/message/{message}', 'MessageController@show')->name('message_show');
        Route::get('/stat/{apartment}', 'StatController@show')->name('stat_show');

        // PROMO
        Route::get('/promo/{apartment}', 'PromoController@index')->name('promo');
        Route::post('/promo/{apartment}/checkout', 'PromoController@checkout')->name('checkout');
        Route::get('/promo/{apartment}/transaction', 'PromoController@transaction')->name('transaction');
});

Route::get('/', 'ApartmentController@index')->name('index');
Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('show');
Route::post('/','ApartmentController@sendMessage')->name('send');
Route::get('/search', function () {

    $datasearch = null;
    $latitude = null;
    $longitude = null;

    if (isset($_GET["search"])) {
        $datasearch = $_GET["search"];
        $latitude = $_GET["latitude"];
        $longitude = $_GET['longitude'];
    }

    return view('guests.search', compact('datasearch','latitude','longitude'));

})->name('search');
Route::get('/prova', function () {
    return view('homepage');
});
