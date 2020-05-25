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

//Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['middleware' => ['citySaved']], function() {

    Route::get('/', 'EstablishmentController@get_main_page')->name('main');


    // AUTHORIZATION && REGISTRATION
    Route::get('login/form', 'UserController@showLogin')->name('loginForm');
    Route::post('login', 'UserController@login')->name('login');
    Route::get('logout', 'UserController@logout')->name('logout');
    Route::get('register/form', 'UserController@showRegister')->name('registerForm');
    Route::get('register/verify/{id}', 'UserController@verifyEmail')->name('verifyEmail');
    Route::post('register', 'UserController@register')->name('register');

    //PROFILE
    Route::get('profile/edit', 'UserController@edit')->name('editProfileForm');
    Route::get('profile/show', 'UserController@profile_show')->name('profile_show');
    Route::post('profile/update', 'UserController@update')->name('updateProfile');


    Route::get('establishments_list/{type}', 'EstablishmentController@get_establishments')->name('establishments');
    Route::get('establishments_filter/{type}', 'EstablishmentController@filterEstablishments')->name('establishments_filter');
    Route::get('establishment/{type}/{est_id}', 'EstablishmentController@get_establishment')->name('establishment');
    Route::get('/images', 'EstablishmentController@getImages')->name('images');

    Route::post('reservation/{est_id}', 'EstablishmentController@reservation')->name('reservation');

    Route::view('selections/view', 'selections_view')->name('selections_view');
    Route::post('selections/processing', 'SelectionController@processing')->name('processing');
    Route::get('selections/show/{type}', 'SelectionController@show')->name('selections_show');


    Route::group(['middleware' => 'mustBeVerified'], function() {
        Route::get('favorites', 'FavoriteController@index')->name('favorites.index');
        Route::get('favorites/{id}', 'FavoriteController@show')->name('favorites.show');
    });

});

Route::get('chooseCity', 'CityController@chooseCityView')->name('chooseCity');
Route::get('setCity/{city_id}', 'CityController@setCity')->name('setCity');

Route::get('readCSV', 'EstablishmentController@readCSV');
