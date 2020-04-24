<?php

namespace App\Http\Controllers;

use App\Models\Average_Check;
use App\Models\Cuisine;
use App\Models\Establishment;
use App\Models\City;
use App\Models\Feature;
use App\Models\Images;
use App\Models\Reservation;
use App\Models\Type;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EstablishmentController extends Controller
{

    public function get_main_page(Request $request){
        $cities = City::all();
        $types = Type::all();
        $type_names = array();
        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }
        return view('main_page');
    }

    public function get_establishments($type, Request $request){
        $city = City::where('id', $request['city_id'])->first();
        $type_model = Type::where('name', $type)->first();
        $ests = Establishment::where('type_id', $type_model->id)->where('city_id', $city->id)->paginate(5);
        $context = ['ests' => $ests, 'est_type' => $type_model];
        return view('establishments', $context);
    }

//    public function get_filtered_establishments($type, Request $request){
//        $cities = City::all();
//        $types = Type::all();
//        $cuisines = Cuisine::all();
//        $features = Feature::all();
//        $city = City::where('id', $request['city_id'])->first();
//        $type_model = Type::where('name', strtolower($type))->first();
//        $ests = Establishment::where('type_id', $type_model->id)->where('city_id', $city->id)->get();
//        $est_ids = array();
//
//        // Filter by cuisines
//        if ($request['cuisine'] != 'any'){
//            foreach ($ests as $est){
//                $temp = $est->cuisines->where('slug', $request['cuisine']);
//                if ($temp != '[]'){
//                    array_push($est_ids, $est->id);
//                }
//            }
//            $ests = $ests->whereIn('id', $est_ids);
//        }
//
//        // Filter bu features
//        $temp = null;
//        $est_ids = array();
//        $feature_ids = array();
//        foreach ($features as $feature){
//            if ($request[$feature->slug] != null and $request[$feature->slug] == 'on'){
//                array_push($feature_ids, $feature->id);
//            }
//        }
//        if (sizeof($feature_ids) != 0){
//            foreach ($ests as $est){
//                $temps = $est->features;
//                $counter = 0;
//                foreach ($feature_ids as $feature_id){
//                    foreach ($temps as $temp){
//                        if ($feature_id === $temp->id){
//                            $counter++;
//                            break;
//                        }
//                    }
//                }
//                if ($counter == sizeof($feature_ids)){
//                    array_push($est_ids, $est->id);
//                }
//            }
//            $ests = $ests->whereIn('id', $est_ids);
//        }
//
//        // Filter by rating
//        if ($request['rating'] === 'on'){
//            $ests = $ests->where('rating', '>', 4.5);
//        }
//        $type_names = array();
//        for ($i = 0; $i < sizeof($types); $i++){
//            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
//        }
//        $context = ['ests' => $ests, 'city' => $city, 'est_type' => $type_model, 'type_names' => $type_names, 'cities' => $cities,
//            'cuisines' => $cuisines, 'features' => $features];
//        return view('establishments', $context);
//    }

    public function get_establishment($type, $est_id, Request $request){
        $type_model = Type::where('name', strtolower($type))->first();
        $establishment = Establishment::where('type_id', $type_model->id)->where('city_id', $request['city_id'])->where('id', $est_id)->first();
        $context = ['establishment' => $establishment, 'est_type' => $type_model];
        return view('establishment', $context);
    }

    public function reservation($est_id, Request $request) {
        $reserve = new Reservation();
        $user_id = Auth::id();
        $reserve->est_id = $est_id;
        $reserve->user_id = $user_id;
        $reserve->time = $request['time'];
        $reserve->seats = $request['seats'];
        $reserve->client_name = $request['client_name'];
        $reserve->save();
        $success = 0;
        if ($reserve != null){
            $success = 1;
        }
        $establishment = Establishment::where('id', $est_id)->first();
        return redirect()->route('establishment', [$establishment->type->name, $est_id])->with('success', $success);
    }

    public function filterEstablishments($type, Request $request) {
        $type_model = Type::where('name', strtolower($type))->first();

        $establishments = Establishment::where('type_id', $type_model->id);

        if ($request['features']) {
            $features = array_keys($request['features']); //takes features array from request

            $establishments = $establishments->whereHas('features', function ($query) use ($features) {
                $query->whereIn('slug', $features);
            });
        }

        if ($request['cuisine']) {
            $cuisine = Cuisine::where('slug', $request['cuisine'])->first();
            if ($cuisine) {
                $establishments->whereHas('cuisines', function($query) use ($cuisine) {
                    $query->where('slug', $cuisine->slug);
                });
            }
        }

        $establishments = $establishments->paginate(5); //Paginate here just a function

        $context = [
            'ests' => $establishments,
            'est_type' => $type_model,
        ];
        return response()->view('establishments', $context);
    }


}
