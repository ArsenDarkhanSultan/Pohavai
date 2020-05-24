<?php

use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Алматы', 'Астана'];

        foreach ($cities as $cit){
            $city = new City();
            $city->name = $cit;
            $city->save();
        }
    }
}
