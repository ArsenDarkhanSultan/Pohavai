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
        $cities = ['Almaty', 'Astana', 'Aktau', 'Aktobe', 'Taraz'];

        $establishments = [
            [
                'name' => 'Restaurant',
                'description' => 'ekdqwkldmql;wdmqkwd',
                'address' => 'Arsennin yuinde',
                'type_id' => 1,
                'city_id' => 1,
                'ave_check_id' => 1,
            ],
            [
                'name' => 'Restaurant',
                'description' => 'ekdqwkldmql;wdmqkwd',
                'address' => 'Arsennin yuinde',
                'type_id' => 1,
                'city_id' => 1,
                'ave_check_id' => 1,
            ],
        ];
        foreach ($cities as $cit){
            $city = new City();
            $city->name = $cit;
            $city->save();
        }
    }
}
