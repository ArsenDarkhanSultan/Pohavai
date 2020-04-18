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

        $dict = ['Del mar' => ['test/img/restaurants/delmar/delmar1.jpeg', 'test/img/restaurants/delmar/delmar2.jpg',
                        'test/img/restaurants/delmar/delmar3.jpg', 'test/img/restaurants/delmar/delmar4.jpg'],
            'Vivaldi' => ['test/img/restaurants/vivaldi/vivaldi1.jpg', 'test/img/restaurants/vivaldi/vivaldi2.jpg',
                        'test/img/restaurants/vivaldi/vivaldi3.jpg', 'test/img/restaurants/vivaldi/vivaldi4.jpg'],
            'Grand Opera' => ['test/img/restaurants/grand_opera/grand_opera1.jpg', 'test/img/restaurants/grand_opera/grand_opera2.jpg',
                         'test/img/restaurants/grand_opera/grand_opera3.jpg', 'test/img/restaurants/grand_opera/grand_opera4.jpg'],
            'East Pan-Asian' => ['test/img/restaurants/east_pan_asian/east_pan_asian1.jpg', 'test/img/restaurants/east_pan_asian/east_pan_asian2.jpg',
                        'test/img/restaurants/east_pan_asian/east_pan_asian3.jpg', 'test/img/restaurants/east_pan_asian/east_pan_asian4.jpg'],
            'China Gold' => ['test/img/restaurants/china_gold/china_gold1.jpg', 'test/img/restaurants/china_gold/china_gold2.jpg',
                        'test/img/restaurants/china_gold/china_gold3.jpg', 'test/img/restaurants/china_gold/china_gold4.jpg'],
            'Myata' => ['test/img/bars/myata/myata1.jpg', 'test/img/bars/myata/myata2.jpg', 'test/img/bars/myata/myata3.jpg',
                        'test/img/bars/myata/myata4.jpg'],
            'Po Pravde' => ['test/img/bars/po_pravde_bar/po_pravde_bar1.jpg', 'test/img/bars/po_pravde_bar/po_pravde_bar2.jpg',
                        'test/img/bars/po_pravde_bar/po_pravde_bar3.jpg', 'test/img/bars/po_pravde_bar/po_pravde_bar4.jpg'],
            'Telescope' => ['test/img/bars/telescope/telescope1.jpg', 'test/img/bars/telescope/telescope2.jpg',
                        'test/img/bars/telescope/telescope3.jpg', 'test/img/bars/telescope/telescope4.jpg'],
            'Tomato' => ['test/img/cafes/tomato/tomato1.jpg', 'test/img/cafes/tomato/tomato2.jpg',
                        'test/img/cafes/tomato/tomato3.jpg', 'test/img/cafes/tomato/tomato4.jpg'],
            'Malibu' => ['test/img/cafes/malibu/malibu1.jpg', 'test/img/cafes/malibu/malibu2.jpg',
                        'test/img/cafes/malibu/malibu3.jpg', 'test/img/cafes/malibu/malibu4.jpg'],
            'Veranda' => ['test/img/cafes/cafe_veranda/cafe_veranda1.jpg', 'test/img/cafes/cafe_veranda/cafe_veranda2.jpg',
                        'test/img/cafes/cafe_veranda/cafe_veranda3.jpg', 'test/img/cafes/cafe_veranda/cafe_veranda4.jpg'],
            'Shafran' => ['test/img/cafes/shafran/shafran1.jpg', 'test/img/cafes/shafran/shafran2.jpg',
                        'test/img/cafes/shafran/shafran3.jpg', 'test/img/cafes/shafran/shafran4.jpg']];

        foreach ($dict as $key => $val) {
            for($i = 0; $i < sizeof($val); $i++) {
                $image = new Images();
                $establishment = Establishment::where('name', $key)->first();
                $image->path = $val[$i];
                $image->imageable_id = $establishment->id;
                $image->imageable_type = 'establishment';
                $image->save();
            }
        }
    }
}
