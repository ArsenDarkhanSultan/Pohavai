<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class CityController extends Controller
{
    public function setCity($city_id) {
        $city = City::find($city_id);

        if ($city) Session::put('city_id', $city_id);

        return redirect()->route('main');
    }

    public function chooseCityView(Request $request) {
        return view('choose_city', ['cities' => City::all()]);
    }
}
