<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Establishment;
use App\Models\Favorite;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{

    public function add(Request $request) {
        $rules = [
            'est_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) return response()->json('error');

        $favorite = Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'establishment_id' => $request['est_id']
        ]);

        return response()->json($favorite);
    }

    public function index(Request $request) {
        $city = City::where('id', $request['city_id'])->first();
        $ests = Auth::user()->favorites()->paginate(10);
        $context = ['ests' => $ests];
        return view('Favorites.index', $context);
    }

    public function destroy($id, Request $request) {

    }
}
