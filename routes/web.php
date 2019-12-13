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

Route::get('/home', 'HotelsController@index')->name('home');
// Route::get('/hotels', 'HotelsController@index')->name('hotels_list');

Route::get('/hotel/{id}','HotelsController@getHotel');
Route::get('/hotel/{hotel_id}/room/{room_no}','HotelsController@getRoom');
// Route::get('/hotel/{hotel_id}/room/type/{room_type}','HotelsController@getRoomByType');
Route::get('/hotel/{hotel_id}/breakfasts','HotelsController@getBreakfasts');
Route::get('/hotel/{hotel_id}/services','HotelsController@getServices');

Route::get('/selected/hotel/{hotel_id}/room/{room_no}','HotelsController@setRoom');
Route::post('/selected/hotel/{hotel_id}/breakfast/{btype}','HotelsController@setBreakfast')->name('select_breakfast');
Route::post('/selected/hotel/{hotel_id}/service/{stype}','HotelsController@setService')->name('select_service');

Route::get('/show/confirmation','HotelsController@showConfirmation');
Route::post('/checkout/', function(){   return redirect()->route('pay_view');  })->name('checkout');
Route::get('/payment/card','HotelsController@showPayment')->name('pay_view');
Route::post('/payment/card','HotelsController@pay')->name('payment');


//Mananger Routes

//Hotel Routes
Route::get('/manager', 'Manager\HotelsController@index')->name('man');

Route::get('/add/hotel', 'Manager\HotelsController@showAddHotel');
Route::post('/add/hotel','Manager\HotelsController@addHotel')->name('add_hotel');
Route::get('/edit/hotel/{hotel_id}', 'Manager\HotelsController@showEditHotel');
Route::post('/edit/hotel/{hotel_id}','Manager\HotelsController@editHotel')->name('edit_hotel');
Route::get('/delete/hotel/{hotel_id}', 'Manager\HotelsController@showDeleteHotel');
Route::post('/delete/hotel/{hotel_id}','Manager\HotelsController@deleteHotel')->name('delete_hotel');


//Room Routes
Route::get('/rooms/hotel/{hotel_id}', 'Manager\HotelsController@viewHotel');
Route::get('/add/hotel/{hotel_id}/room', 'Manager\RoomsController@showAddRoom');
Route::post('/add/hotel/{hotel_id}/room','Manager\RoomsController@addRoom')->name('add_room');
Route::get('/edit/hotel/{hotel_id}/room/{room_no}','Manager\RoomsController@showEditRoom');
Route::post('/edit/hotel/{hotel_id}/room/{room_no}','Manager\RoomsController@editRoom')->name('edit_room');
Route::get('/delete/hotel/{hotel_id}/room/{room_no}','Manager\RoomsController@showDeleteRoom');
Route::post('/delete/hotel/{hotel_id}/room/{room_no}','Manager\RoomsController@deleteRoom')->name('delete_room');
Route::get('/review/hotel/{hotel_id}/room/{room_no}','Manager\RoomsController@viewRoom');
Route::get('/reservation/hotel/{hotel_id}/room/{room_no}','Manager\RoomsController@viewRoomReservations');

//Services Routes
Route::get('/services/hotel/{hotel_id}', 'Manager\ServicesController@showAllServices');
Route::get('/review/hotel/{hotel_id}/service/{stype}','Manager\ServicesController@viewService');
Route::get('/add/hotel/{hotel_id}/service','Manager\ServicesController@showAddService');
Route::post('/add/hotel/{hotel_id}/service','Manager\ServicesController@addService')->name('add_service');
Route::get('/edit/hotel/{hotel_id}/service/{stype}','Manager\ServicesController@showEditService');
Route::post('/edit/hotel/{hotel_id}/service/{stype}','Manager\ServicesController@editService')->name('edit_service');
Route::get('/delete/hotel/{hotel_id}/service/{stype}','Manager\ServicesController@showDeleteService');
Route::post('/delete/hotel/{hotel_id}/service/{stype}','Manager\ServicesController@deleteService')->name('delete_service');
Route::get('/reservation/hotel/{hotel_id}/service/{stype}','Manager\ServicesController@viewServiceReservation');

//Breakfasts Routes
Route::get('/breakfasts/hotel/{hotel_id}', 'Manager\BreakfastsController@showAllBreakfasts');
Route::get('/review/hotel/{hotel_id}/breakfast/{stype}','Manager\BreakfastsController@viewBreakfast');
Route::get('/add/hotel/{hotel_id}/breakfast','Manager\BreakfastsController@showAddBreakfast');
Route::post('/add/hotel/{hotel_id}/breakfast','Manager\BreakfastsController@addBreakfast')->name('add_breakfast');
Route::get('/edit/hotel/{hotel_id}/breakfast/{btype}','Manager\BreakfastsController@showEditBreakfast');
Route::post('/edit/hotel/{hotel_id}/breakfast/{btype}','Manager\BreakfastsController@editBreakfast')->name('edit_breakfast');
Route::get('/delete/hotel/{hotel_id}/breakfast/{btype}','Manager\BreakfastsController@showDeleteBreakfast');
Route::post('/delete/hotel/{hotel_id}/breakfast/{btype}','Manager\BreakfastsController@deleteBreakfast')->name('delete_breakfast');
Route::get('/reservation/hotel/{hotel_id}/breakfast/{btype}','Manager\BreakfastsController@viewBreakfastReservation');

//Offers
Route::get('/offers/hotel/{hotel_id}', 'Manager\OffersController@showAllOffers');
Route::get('/add/hotel/{hotel_id}/offer','Manager\OffersController@showAddOffers');
Route::post('/add/hotel/{hotel_id}/offer','Manager\OffersController@addOffers')->name('add_offer');
// Route::get('/edit/hotel/{hotel_id}/offer/{room_no}','Manager\BreakfastsController@showEditBreakfast');
// Route::post('/edit/hotel/{hotel_id}/offer/{room_no}','Manager\BreakfastsController@editBreakfast')->name('edit_breakfast');
Route::get('/delete/hotel/{hotel_id}/offer/{room_no}/{start_date}/{end_date}','Manager\OffersController@showDeleteOffer');
Route::post('/delete/hotel/{hotel_id}/offer/{room_no}/{start_date}/{end_date}','Manager\OffersController@deleteOffer')->name('delete_offer');
