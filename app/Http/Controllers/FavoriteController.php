<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Establishment;
use App\Models\Type;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request) {
        $city = City::where('id', $request['city_id'])->first();
        $ests = Establishment::paginate(20);
        $context = ['ests' => $ests];
        return view('Favorites.index', $context);
    }

    public function destroy($id, Request $request) {

    }
}
