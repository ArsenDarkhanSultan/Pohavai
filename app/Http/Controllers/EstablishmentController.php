<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\City;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function get_establishment($city_id, $type, Request $request){
//        $cities = City::all();
        $city = City::where('id', $city_id)->first();
        $ests = Establishment::where('type', $type)->where('city_id', $city->id)->get();
        $type = ucwords($type);
        return view('establishments', ['ests' => $ests, 'city' => $city, 'est_type' => $type]);
    }


    public function getImages() {
        $restaurant = Establishment::first();
        //dd($restaurant->images->toJson());
        return redirect()->to(asset($restaurant->images[0]->path));
    }

}
