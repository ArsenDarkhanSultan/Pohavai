<?php

use Illuminate\Database\Seeder;
use App\Models\Cuisine;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Mediterranean', 'European', 'Eastern', 'Chinese', 'Japanese', 'pan-Asian', 'Italian', 'Caucasian', 'Kazakh', 'Russian',
            'American', 'French'];
        for ($i = 0; $i < sizeof($names); $i++){
            $cuisine = new Cuisine();
            $cuisine->name = $names[$i];
            $cuisine->slug = strtolower($names[$i]);
            $cuisine->save();
        }
    }
}
