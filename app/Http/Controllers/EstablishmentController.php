<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\City;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function get_restaurants($id, Request $request){
//        $cities = City::all();
        $city = City::where('id', $id)->first();
        $restaurants = Establishment::where('type', 'restaurant')->where('city_id', $city->id)->get();
        return view('restaurants', ['restaurants' => $restaurants, 'city' => $city]);
    }
    public function get_bars($id, Request $request){
//        $cities = City::all();
        $city = City::where('id', $id)->first();
        $bars = Establishment::where('type', 'bar')->where('city_id', $city->id)->get();
        return view('bars', ['bars' => $bars, 'city' => $city]);
    }
    public function get_cafes($id, Request $request){
//        $cities = City::all();
        $city = City::where('id', $id)->first();
        $cafes = Establishment::where('type', 'cafe')->where('city_id', $city->id)->get();
        return view('cafes', ['cafes' => $cafes, 'city' => $city]);
    }
    public function getImages() {
        $restaurant = Establishment::first();
        //dd($restaurant->images->toJson());
        return redirect()->to(asset($restaurant->images[0]->path));
    }

}
