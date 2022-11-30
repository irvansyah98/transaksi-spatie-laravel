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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/backend'], function() {
    Route::get('/', array('as' => 'dashboard', 'uses' => 'DashboardController@index'))->middleware(['role:admin|guest']);

    Route::resource('admin', 'AdminController')->middleware(['role:admin']);
    Route::resource('guest', 'GuestController')->middleware(['role:admin']);
    Route::resource('order','OrderController')->middleware(['role:admin']);
});