<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\City;
use App\Models\Type;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function  get_main_page(Request $request){
        $cities = City::all();
        $types = Type::all();
        $type_names = array();
        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }
        $context = ['type_names' => $type_names, 'cities' => $cities];
        return view('main_page', $context);
    }


    public function get_establishment($city_id, $type, Request $request){
        $city = City::where('id', $city_id)->first();
        $type_model = Type::where('name', $type)->first();
        $ests = Establishment::where('type_id', $type_model->id)->where('city_id', $city->id)->get();
        $type = ucwords($type);
        $cities = City::all();
        $types = Type::all();
        $type_names = array();
        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }
        $context = array_merge(['ests' => $ests, 'city' => $city, 'est_type' => $type], ['type_names' => $type_names, 'cities' => $cities]);
        return view('establishments', $context);
    }


    public function getImages() {
        $restaurant = Establishment::first();
        //dd($restaurant->images->toJson());
        return redirect()->to(asset($restaurant->images[0]->path));
    }

}
