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
Route::get('/hotels', 'HotelsController@index')->name('hotels_list');

Route::get('/hotel/{id}','HotelsController@getHotel');
Route::get('/hotel/{hotel_id}/room/{room_no}','HotelsController@getRoom');
// Route::get('/hotel/{hotel_id}/room/type/{room_type}','HotelsController@getRoomByType');
Route::get('/hotel/{hotel_id}/breakfasts','HotelsController@getBreakfasts');
Route::get('/hotel/{hotel_id}/services','HotelsController@getServices');

Route::get('/selected/hotel/{hotel_id}/room/{room_no}','HotelsController@setRoom');
Route::get('/selected/hotel/{hotel_id}/breakfast/{b_type}','HotelsController@setBreakfast');
