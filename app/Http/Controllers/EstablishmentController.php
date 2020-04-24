<?php

namespace App\Http\Controllers;

use App\Models\Average_Check;
use App\Models\Cuisine;
use App\Models\Establishment;
use App\Models\City;
use App\Models\Feature;
use App\Models\Images;
use App\Models\Type;
use App\Models\Review;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EstablishmentController extends Controller
{

    public function get_main_page(Request $request){
        $cities = City::all();
        $types = Type::all();
        $type_names = array();
        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }
        $context = ['type_names' => $type_names, 'cities' => $cities];
        return view('main_page', $context);
    }

    public function get_establishments($type, Request $request){
        $city = City::where('id', $request['city_id'])->first();
        $type_model = Type::where('name', $type)->first();
        $ests = Establishment::where('type_id', $type_model->id)->where('city_id', $city->id)->get();
        $type = ucwords($type);
        $cities = City::all();
        $types = Type::all();
        $cuisines = Cuisine::all();
        $features = Feature::all();
        $type_names = array();
        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }
        $context = ['ests' => $ests, 'city' => $city, 'est_type' => $type_model, 'type_names' => $type_names, 'cities' => $cities,
            'cuisines' => $cuisines, 'features' => $features];
        $revs = Review::where('id', 1)->first();
        return view('establishments', $context);
    }

    public function get_filtered_establishments($type, Request $request){
        $cities = City::all();
        $types = Type::all();
        $cuisines = Cuisine::all();
        $features = Feature::all();
        $city = City::where('id', $request['city_id'])->first();
        $type_model = Type::where('name', strtolower($type))->first();
        $ests = Establishment::where('type_id', $type_model->id)->where('city_id', $city->id)->paginate(20);
        $est_ids = array();

        // Filter by cuisines
        if ($request['cuisine'] != 'any'){
            foreach ($ests as $est){
                $temp = $est->cuisines->where('slug', $request['cuisine']);
                if ($temp != '[]'){
                    array_push($est_ids, $est->id);
                }
            }
            $ests = $ests->whereIn('id', $est_ids);
        }

        // Filter bu features
        $temp = null;
        $est_ids = array();
        $feature_ids = array();

        foreach ($features as $feature){
            if ($request[$feature->slug] != null and $request[$feature->slug] == 'on'){
                array_push($feature_ids, $feature->id);
            }
        }
        if (sizeof($feature_ids) != 0){
            foreach ($ests as $est){
                $temps = $est->features;
                $counter = 0;
                foreach ($feature_ids as $feature_id){
                    foreach ($temps as $temp){
                        if ($feature_id === $temp->id){
                            $counter++;
                            break;
                        }
                    }
                }
                if ($counter == sizeof($feature_ids)){
                    array_push($est_ids, $est->id);
                }
            }
            $ests = $ests->whereIn('id', $est_ids);
        }

        // Filter by rating
        if ($request['rating'] === 'on'){
            $ests = $ests->where('rating', '>', 4.5);
        }
        $type_names = array();

        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }

        $context = [
            'ests' => $ests,
            'city' => $city,
            'est_type' => $type_model,
            'type_names' => $type_names,
            'cities' => $cities,
            'cuisines' => $cuisines,
            'features' => $features
        ];
        return view('establishments', $context);
    }

    public function get_establishment($type, $est_id, Request $request){
        $type_model = Type::where('name', strtolower($type))->first();
        $establishment = Establishment::where('type_id', $type_model->id)->where('city_id', $request['city_id'])->where('id', $est_id)->first();
        $cities = City::all();
        $types = Type::all();
        $type_names = array();
        for ($i = 0; $i < sizeof($types); $i++){
            $type_names[$types[$i]->name] = strtoupper($types[$i]->name);
        }
        $context = [
            'establishment' => $establishment,
            'est_type' => $type_model,
            'type_names' => $type_names,
            'cities' => $cities
        ];
        return view('establishment', $context);
    }

    public function getImages() {
        $restaurant = Establishment::first();
        //dd($restaurant->images->toJson());
        return redirect()->to(asset($restaurant->images[0]->path));
    }

    public function filterEstablishments($type, Request $request) {
        $type_model = Type::where('name', strtolower($type))->first();

        $establishments = Establishment::query();

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

        $establishments = $establishments->paginate(3); //Paginate here just a function

        $content = [
            'ests' => $establishments,
            'est_type' => $type_model,
        ];
        return response()->view('establishments', $content);
    }

    public function readCSV(Request $request) {
        //$file = Storage::disk('public')->get('db/establishments.csv');
        //dd($file);

        $fileUrl = Storage::disk('public')->url('db/establishments.csv');

        DB::table('establishments')->delete();

        $actualArr = array_map('str_getcsv', file($fileUrl));
        $header = array_shift($actualArr);
        array_walk($actualArr, function($row, $key, $header) use ($actualArr) {
            $row = array_combine($header, $row);
            $establishment = new Establishment();
            $establishment->name = $row['title_x'];
            $establishment->description = $row['description'];
            $establishment->address = $row['addres'];
            $establishment->rating = 0;
            $establishment->city_id = $row['city_id'];
            $establishment->type_id = $row['type'];
            $establishment->ave_check_id = 1;
            $establishment->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img1'];
            $image->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img2'];
            $image->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img3'];
            $image->save();

            $image = new Images();
            $image->imageable_type = 'establishment';
            $image->imageable_id = $establishment->id;
            $image->path = $row['img4'];
            $image->save();

        }, $header);

    }

}
