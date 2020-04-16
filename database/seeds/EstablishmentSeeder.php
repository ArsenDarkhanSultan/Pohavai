<?php

use Illuminate\Database\Seeder;
use App\Models\Establishment;
class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [1, 2, 3];
        $names = ['restaurant' => ['Del mar', 'Vivaldi', 'Grand Opera', 'East Pan-Asian', 'China Gold'], 'bar' => ['Myata', 'Po Pravde', 'Telescope'],
            'cafe' => ['Tomato', 'Malibu', 'Veranda', 'Shafran']];
        $description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
        $address = 'Manasa-41';
        $cuisines = ['Del mar' => 'Mediterranean, European', 'Vivaldi' => 'European', 'Grand Opera' => 'European, Eastern',
            'East Pan-Asian' => 'pan-Asian', 'China Gold' => 'Chinese, Japanese, European', 'Myata' => 'European',
            'Po Pravde' => 'European', 'Eastern', 'Telescope' => 'European, Eastern', 'Tomato' => 'Italian, European',
            'Malibu' => 'European, Caucasian, Kazakh', 'Veranda' => 'European, Eastern, Caucasian, Kazakh',
            'Shafran' => 'Eastern, European, Japanese'];
        $ave_check = ['Del mar' => '15000-20000', 'Vivaldi' => '7000-10000', 'Grand Opera' => '5000-10000', 'East Pan-Asian' =>
        '15000-25000', 'China Gold' => '10000-15000', 'Myata' => '7000-10000', 'Po Pravde' => '4000-8000', 'Telescope' => '4000-8000',
            'Tomato' => '4000-8000', 'Malibu' => '3000-5000', 'Veranda' => '3000-5000', 'Shafran' => '3000-5000'];
        $features = ['Del mar' => 'Wifi', 'Vivaldi' => 'Karaoke, Hookah, Wifi', 'Grand Opera' => 'Karaoke, Hookah, Wifi', 'East Pan-Asian' =>
            'Wifi, Live music', 'China Gold' => 'Wifi, Hookah, Live music', 'Myata' => 'Wifi, Hookah', 'Po Pravde' => 'Wifi, Hookah',
            'Telescope' => 'Wifi, Hookah', 'Tomato' => 'Wifi, Hookah, Live music', 'Malibu' => 'Wifi', 'Veranda' => 'Wifi', 'Shafran' => 'Wifi'];
        $ratings = ['Del mar' => 4.8, 'Vivaldi' => 4.4, 'Grand Opera' => 4.5, 'East Pan-Asian' =>
            4.8, 'China Gold' => 4.6, 'Myata' => 4.6, 'Po Pravde' => 4.2,
            'Telescope' => 4.1, 'Tomato' => 4.4, 'Malibu' => 3.9, 'Veranda' => 3.9, 'Shafran' => 4.2];
        $city_id = 1;
        for ($i = 0; $i < 5; $i++){
            $est = new Establishment();
            $est->type_id = $types[0];
            $est->name = $names['restaurant'][$i];
            $est->description = $description;
            $est->address = $address;
            $est->cuisines = $cuisines[$names['restaurant'][$i]];
            $est->ave_check = $ave_check[$names['restaurant'][$i]];
            $est->features = $features[$names['restaurant'][$i]];
            $est->rating = $ratings[$names['restaurant'][$i]];
            $est->city_id = $city_id;
            $est->save();
        }
        for ($i = 0; $i < 3; $i++){
            $est = new Establishment();
            $est->type_id = $types[1];
            $est->name = $names['bar'][$i];
            $est->description = $description;
            $est->address = $address;
            $est->cuisines = $cuisines[$names['bar'][$i]];
            $est->ave_check = $ave_check[$names['bar'][$i]];
            $est->features = $features[$names['bar'][$i]];
            $est->rating = $ratings[$names['bar'][$i]];
            $est->city_id = $city_id;
            $est->save();
        }
        for ($i = 0; $i < 4; $i++){
            $est = new Establishment();
            $est->type_id = $types[2];
            $est->name = $names['cafe'][$i];
            $est->description = $description;
            $est->address = $address;
            $est->cuisines = $cuisines[$names['cafe'][$i]];
            $est->ave_check = $ave_check[$names['cafe'][$i]];
            $est->features = $features[$names['cafe'][$i]];
            $est->rating = $ratings[$names['cafe'][$i]];
            $est->city_id = $city_id;
            $est->save();
        }
    }
}
