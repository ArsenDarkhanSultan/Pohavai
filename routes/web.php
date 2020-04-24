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

//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['middleware' => 'citySaved'], function() {

    Route::get('/', 'EstablishmentController@get_main_page')->name('main');


    Route::get('login/form', 'UserController@showLogin')->name('loginForm');
    Route::post('login', 'UserController@login')->name('login');
    Route::get('logout', 'UserController@logout')->name('logout');
    Route::get('register/form', 'UserController@showRegister')->name('registerForm');
    Route::post('register', 'UserController@register')->name('register');

    Route::get('establishments_list/{type}', 'EstablishmentController@get_establishments')->name('establishments');
    Route::get('establishments_filter/{type}', 'EstablishmentController@filterEstablishments')->name('establishments_filter');
    Route::get('establishment/{type}/{est_id}', 'EstablishmentController@get_establishment')->name('establishment');
    Route::get('/images', 'EstablishmentController@getImages')->name('images');

    Route::post('reservation/{est_id}', 'EstablishmentController@reservation')->name('reservation');

});

Route::get('chooseCity', 'CityController@chooseCityView')->name('chooseCity');
Route::get('setCity/{city_id}', 'CityController@setCity')->name('setCity');

Route::get('readCSV', 'EstablishmentController@readCSV');
Route::get('chooseCity', 'CityController@chooseCityView')->name('chooseCity');
