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
         $this->call(EstablishmentSeeder::class);
         $this->call(ImageSeeder::class);
         $this->call(ScheduleSeeder::class);
    }
}