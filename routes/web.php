<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', '/stays');

Route::resource('bills', 'BillController');
Route::resource('guests', 'GuestController');
Route::resource('reservations', 'ReservationController');
Route::resource('rooms', 'RoomController');
Route::resource('services', 'ServiceController');
Route::resource('stays', 'StayController');

Route::post('/stays/{stay}/services', 'StayController@storeService');
Route::get('/stays/{stay}/bills', 'StayController@storeBill');
Route::get('/guests/create/{stay}', 'GuestController@create');

Route::put('/stays/{stay}/checkout', 'StayController@checkOut')->name('stays.checkout');
Route::get('bills/{bill}/email', 'BillController@email')->name('bills.email');

Route::get('reservations/{reservation}/stay', 'ReservationController@storeStay')->name('reservations.stay');
