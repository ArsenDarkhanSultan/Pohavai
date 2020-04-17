<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitySeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(AverageCheckSeeder::class);
        $this->call(EstablishmentSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(CuisineSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(MainFoodSeeder::class);
    }
}
