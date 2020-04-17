<?php

use Illuminate\Database\Seeder;
use App\Models\Main_foods;

class MainFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = ['Steak', 'Burger', 'Pizza', 'Sushi', 'Plov', 'Pasta', 'Barbecue', 'Ramen', 'Lagman', 'Soup'];
        foreach ($foods as $food){
            $main_food = new Main_foods();
            $main_food->name = $food;
            $main_food->slug = strtolower($food);
            $main_food->save();
        }
    }
}
