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
            $city = City::find(Session::get('city_id'));
            if (!$city) {
                Session::remove('city_id');
                return redirect()->route('chooseCity');
            }

            $request['city_id'] = Session::get('city_id');
            $request['city'] = $city;
            return $next($request);
        }
        else {
            return redirect()->route('chooseCity');
        }
    }
}
