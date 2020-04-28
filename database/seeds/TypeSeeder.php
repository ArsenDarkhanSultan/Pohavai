<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['restaurant', 'bar', 'cafe', 'karaoke'];
        $titles = ['Рестораны', 'Бары', 'Кафе', 'Караоке'];
        for ($i = 0; $i < sizeof($names); $i++){
            $type = new Type();
            $type->name = $names[$i];
            $type->title = $titles[$i];
            $type->save();
        }

    }
}
