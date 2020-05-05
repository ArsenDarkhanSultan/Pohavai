<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Establishment;
use App\Models\Type;
use Illuminate\Http\Request;

class SelectionController extends Controller
{

    public function show($type, Request $request){
        $type_model = Type::where('name', $type)->first();
        $ests = Establishment::whereIn('id', session('est_ids'))->paginate(5);
        $context = ['ests' => $ests, 'est_type' => $type_model];
        return view('selections_show', $context);
    }

    public function processing(Request $request){
        $type_id = 1;
        if ($request['type'] !== 'any') {
            $type_id = Type::where('name', $request['type'])->first()->id;
        }
        $preferences = '';
        if ($request['features']) {
            $features = array_keys($request['features']); //takes features array from request
            foreach ($features as $feature) {
                $preferences .= $feature . ' ';
            }
        }
        if ($request['cuisines']) {
            $cuisines = array_keys($request['cuisines']); //takes cuisines array from request
            foreach ($cuisines as $cuisine) {
                $preferences .= $cuisine . ' ';
            }
        }
        if (strlen($preferences) !== 0){
            $preferences = substr($preferences, 0, strlen($preferences) - 1);
        }

        $preferences = str_replace(' ', '_', $preferences);
        $response = file_get_contents('http://localhost:8001/selective/'.$request['city_id'].'/'.$type_id.'/'.$preferences.'/');
        $est_ids = json_decode($response, true)['id'];
        $type_model = Type::where('id', $type_id)->first();
        session()->put('est_ids', $est_ids);
        return redirect()->route('selections_show', $type_model->name);
    }
}
