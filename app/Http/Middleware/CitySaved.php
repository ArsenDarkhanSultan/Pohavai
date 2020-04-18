<?php

namespace App\Http\Middleware;

use App\Models\City;
use Closure;
use Illuminate\Support\Facades\Session;

class CitySaved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('city_id')) {
            $request['city_id'] = Session::get('city_id');
            return $next($request);
        }
        else {
            $cities = City::all();
            return response()->view('choose_city', compact('cities'));
        }
    }
}
