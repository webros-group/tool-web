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

Route::get('/', 'HomeController@index')->name('index');
Route::post('/', 'HomeController@index')->name('indexPost');
Route::get('/stripe', 'HomeController@stripe')->name('stripe');
Route::post('/stripe', 'HomeController@stripe')->name('stripePost');
Route::get('/paypal', 'HomeController@paypal')->name('paypal');
Route::post('/paypal', 'HomeController@paypal')->name('paypalPost');


Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
