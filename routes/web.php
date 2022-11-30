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

Route::get('login','HomeController@login1')->name('login');
Route::post('checklogin','HomeController@checklogin')->name('checklogin');
Route::post('updatewithdraw','HomeController@updatewithdraw')->name('updatewithdraw');

Route::get('logout','HomeController@logout')->name('logout');
Route::get('home','HomeController@home')->name('home');
Route::get('withdraw','HomeController@withdraw')->name('withdraw');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
