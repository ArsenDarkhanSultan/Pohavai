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
        $checks = [
            '10000-15000',
            '1500-3000',
            '15000-25000',
            '3000-4500',
            '4500-7000',
            '700-1500',
            '7000-10000',
            'Свыше 25000'
            ];
        $slugs = [
            '10000_15000',
            '1500_3000',
            '15000_25000',
            '3000_4500',
            '4500_7000',
            '700_1500',
            '7000_10000',
            'svyshe_25000'
        ];
        for ($i = 0; $i < sizeof($checks); $i++){
            $ave_check = new Average_Check();
            $ave_check->check = $checks[$i];
            $ave_check->slug = $slugs[$i];
            $ave_check->save();
        }
    }
}
