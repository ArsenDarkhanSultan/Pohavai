<?php

use App\Models\Establishment;
use App\Models\Images;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $users = User::all();
//        foreach ($users as $user) {
//            $image = new Images();
//            $image->path = 'test/img/user.png';
//            $image->imageable_id = $user->id;
//            $image->imageable_type = array_search(User::class, Relation::$morphMap);
//            $image->save();
//        }

        $dict = ['Del mar' => 'test/img/restaurants/delmar.jpeg', 'Vivaldi' => 'test/img/restaurants/vivaldi.jpg', 'Grand Opera' => 'test/img/restaurants/grand_opera.jpg',
            'East Pan-Asian' => 'test/img/restaurants/east_pan_asian.jpg', 'China Gold' => 'test/img/restaurants/china_gold.jpg', 'Myata' => 'test/img/bars/myata.jpg',
            'Po Pravde' => 'test/img/bars/po_pravde_bar.jpg', 'Telescope' => 'test/img/bars/telescope.jpg',
            'Tomato' => 'test/img/cafes/tomato.jpg', 'Malibu' => 'test/img/cafes/malibu.jpg', 'Veranda' => 'test/img/cafes/cafe-veranda.jpg',
            'Shafran' => 'test/img/cafes/shafran.jpg'];

        foreach ($dict as $key => $val) {
            $image = new Images();
            $establishment = Establishment::where('name', $key)->first();
            $image->path = $val;
            $image->imageable_id = $establishment->id;
            $image->imageable_type = 'establishment';
            $image->save();
        }
    }
}
