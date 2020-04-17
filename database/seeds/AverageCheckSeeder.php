<?php

use Illuminate\Database\Seeder;
use App\Models\Average_Check;

class AverageCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checks = ['3000-5000', '5000-7000', '5000-10000', '7000-12000', '10000-15000', '15000-20000', '15000-25000'];
        $slugs = ['3000_5000', '5000_7000', '5000_10000', '7000_12000', '10000_15000', '15000_20000', '15000_25000'];
        for ($i = 0; $i < sizeof($checks); $i++){
            $ave_check = new Average_Check();
            $ave_check->check = $checks[$i];
            $ave_check->slug = $slugs[$i];
            $ave_check->save();
        }
    }
}
