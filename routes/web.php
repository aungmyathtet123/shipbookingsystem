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

Route::get('/', 'FrontendController@home')->name('homepage');
Route::post('/search', 'FrontendController@search')->name('search');
Route::get('/seat/{id}/{type}/{date}', 'FrontendController@seat')->name('seat');
Route::post('/store', 'FrontendController@store')->name('store');
Route::post('/bookingstore', 'FrontendController@bookingstore')->name('bookingstore');
Route::post('/editsearch', 'FrontendController@editsearch')->name('editsearch');
Route::post('/filter', 'FrontendController@filter')->name('filter');



// Route::get('/seat',function(){
// 	return view('frontend.seat');
// })->name('seat');


Route::get('/backend',function(){
	 return view('backend');
})->name('backend');


Route::resource('operator','OperatorController');
Route::resource('city','CityController');
Route::resource('ship','ShipController');
Route::resource('routes','RouteController');
Route::resource('booking','BookingController');



