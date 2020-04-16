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

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main_page');
});

Route::get('/restaurants/{id}', 'EstablishmentController@get_restaurants');
Route::get('/bars/{id}', 'EstablishmentController@get_bars');
Route::get('/cafes/{id}', 'EstablishmentController@get_cafes');

Route::get('/images', 'EstablishmentController@getImages');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
