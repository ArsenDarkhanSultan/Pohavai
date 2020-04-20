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
        $description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
        $address = 'Manasa-41';
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
            $est->rating = $ratings[$names['cafe'][$i]];
            $est->city_id = $city_id;
            $est->save();
        }
        $establishments = [
            [
                'name' => 'Bon Appetit',
                'description' => 'Restaurant with a pleasant atmosphere. Bright, spacious room with bright furniture and a no-frills interior.​',
                'address' => 'Kaldayakova, 38',
                'city_id' => 1,
                'type_id' => 3,
                'ave_check_id' => 1
            ],

            [
                'name' => 'Chechil Pub',
                'description' => 'This is a real oasis of calm, friendly, warm atmosphere and home comfort, located in the center of a bustling metropolis.',
                'address' => 'Rozbakieva, 77',
                'city_id' => 1,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'CoffeeBOOM',
                'description' => 'This is an American brand that began its activities in Kazakhstan in 2013.',
                'address' => 'Bogenbai batyr, 121',
                'city_id' => 1,
                'type_id' => 3,
                'ave_check_id' => 3
            ],

            [
                'name' => 'Fellini',
                'description' => 'These are real traditional dishes, colorful interior in national style and quality service.',
                'address' => 'Al-Farabi avenue, 77/8',
                'city_id' => 1,
                'type_id' => 1,
                'ave_check_id' => 2
            ],

            [
                'name' => 'GLORIA JEAN`S COFFEES',
                'description' => 'It is a small establishment with a pleasant atmosphere, minimalistic interior, a good selection of drinks and desserts.',
                'address' => '​​​​Абылай хана проспект, 113',
                'city_id' => 1,
                'type_id' => 3,
                'ave_check_id' => 3
            ],

            [
                'name' => 'ШашлыкоFF Grill & Bar',
                'description' => 'A bar in the fashionable style of mixing the old-fashioned cinematic interior with modern elements.',
                'address' => 'Tole bi, 89',
                'city_id' => 1,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Guiness Pub',
                'description' => 'This is a small cozy pub located in the city center. With us you will plunge into the atmosphere of a British pub.',
                'address' => 'Dostyk avenue, 71',
                'city_id' => 1,
                'type_id' => 2,
                'ave_check_id' => 2
            ]
            ,

            [
                'name' => 'KOREAN HOUSE',
                'description' => 'Then a bewitching world of entertainment and favorite holidays. Our team offers young guests a whole interactive town.',
                'address' => 'Kabanbai batyr, 87',
                'city_id' => 1,
                'type_id' => 1,
                'ave_check_id' => 2
            ],

            [
                'name' => 'La Tartine',
                'description' => 'The evolution of taste. What new can you learn today about such famous drinks as coffee and tea?',
                'address' => 'Samal 2nd microdistrict, 111',
                'city_id' => 1,
                'type_id' => 3,
                'ave_check_id' => 3
            ],

            [
                'name' => 'Grelka',
                'description' => 'A bright representative of home Scandinavian cuisine in Almaty, its authenticity and originality is presented in every dish, atmosphere and emotions.',
                'address' => 'Kerey-Zhanibek khans, 640/3',
                'city_id' => 1,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Aura Lounge Bar',
                'description' => 'This is nine VIP booths and four separate halls exclusively for banquets, space - from 30 to 90 people.',
                'address' => 'Kurmangazy, 66',
                'city_id' => 1,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Mamma mia',
                'description' => 'This quality in everything, in this service, service. The establishment is suitable for dinner, lunch, family celebrations, meetings with friends and goodbye.',
                'address' => 'Al-Farabi avenue, 7',
                'city_id' => 1,
                'type_id' => 1,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Coffee Original',
                'description' => 'This is a modern city coffee shop with a spacious summer terrace. It will appeal to those who like to have breakfast slowly, drink traditional coffee.',
                'address' => 'Auezov, 165',
                'city_id' => 1,
                'type_id' => 3,
                'ave_check_id' => 3
            ],

            [
                'name' => 'Nedelka',
                'description' => 'This is a popular and welcoming place, the main advantage of which is the special atmosphere and comfort.',
                'address' => 'Abay avenue, 19',
                'city_id' => 1,
                'type_id' => 3,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Pizza Hut',
                'description' => 'Undoubtedly suitable for a business meeting, a family evening and a romantic dinner, leaving an unforgettable vacation experience.',
                'address' => 'Ablylai khan avenue, 62',
                'city_id'
                => 1,
                'type_id' => 3,
                'ave_check_id' => 2
            ],
            [
                'name' => 'Cafestar',
                'description' => 'Unique institution of our capital.',
                'address' => 'Dostyk, 13',
                'city_id' => 2,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'MILLIONAIRE',
                'description' => 'The karaoke restaurant Millionaire is a new premium venue. The territory of beautiful and vibrant events, crazy atmosphere and unique relaxation.',
                'address' => 'Eternal Country Avenue, 54',
                'city_id' => 2,
                'type_id' => 1,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Prazhechka',
                'description' => 'Welcome drink for every guest. Discounts do not apply on holidays.',
                'address' => 'Ablylai khan avenue, 21',
                'city_id' => 2,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Noto',
                'description' => 'Healthy dishes are served that are not only pleasurable, but also beneficial for the body.',
                'address' => 'Dostyk, 5/1',
                'city_id' => 2,
                'type_id' => 2,
                'ave_check_id' => 2
            ],

            [
                'name' => 'Buffet',
                'description' => 'The only bowling alley in the city with a restaurant, a children\'s area, animators, a karaoke room, a contact bar, a dance floor and a smoky hookah.',
                'address' => 'Almaty, 13',
                'city_id' => 2,
                'type_id' => 3,
                'ave_check_id' => 3
            ],
            [
                'name' => 'RestoBar 1958',
                'description' => 'Business lunch from 1200tg, grill bars',
                'address' => 'Abylai khan avenue, 121',
                'type_id' => 2,
                'city_id' => 1,
                'ave_check_id' => 2,
            ],
            [
                'name' => 'Safran',
                'description' => 'Reservations, Seating, Serving alcohol, Tables outside, Visitor services at tables',
                'address' => '​Bajanaulskaja, 30',
                'type_id' => 1,
                'city_id' => 1,
                'ave_check_id' => 1,
            ],
            [
                'name' => 'SOHO Bar-Concert & Meat',
                'description' => 'Convenient for breakfast, summer terrace, alcohol - full bar, outdoor parking',
                'address' => 'Kazybek bi, 65',
                'type_id' => 2,
                'city_id' => 1,
                'ave_check_id' => 2,
            ],
            [
                'name' => 'Sultan Sarai',
                'description' => 'Restaurant "Sultan Sarai" invites everyone to celebrate your event! We guarantee a cozy atmosphere, a delicious dish and a good mood! Waiting for everybody!',
                'address' => '​Ajeroportnaja, 24',
                'type_id' => 1,
                'city_id' => 1,
                'ave_check_id' => 1,
            ],
            [
                'name' => 'BOCHONOK',
                'description' => 'A chain of modern beer restaurants for people who value taste, pleasure and chatting with friends, for example, in the evening after work. The menu in the restaurants was developed and monitored every day by our invited chef from Moscow.',
                'address' => 'Nazarbaev avenue, 193',
                'type_id' => 3,
                'city_id' => 1,
                'ave_check_id' => 2,
            ],
            [
                'name' => 'Gornyj',
                'description' => '"Gornyj" - a picturesque mountain corner of paradise, harmoniously combining the best conditions and service for your vacation with family or friends! We made sure that your stay was comfortable and left only vivid impressions!',
                'address' => 'Alma-Arasan Gorge, 1/7',
                'type_id' => 1,
                'city_id' => 1,
                'ave_check_id' => 3,
            ],
            [
                'name' => 'Kabachok Gorynych',
                'description' => 'Gorynych is a democratic bar for friends, where a friendly atmosphere and good service prevail. We affectionately call it "Kabachok". Exists since 2004.',
                'address' => '​Gagarina avenue, 298a',
                'type_id' => 3,
                'city_id' => 1,
                'ave_check_id' => 1,
            ],
            [
                'name' => 'Madlen',
                'description' => 'Lorem ipsum dolor.',
                'address' => 'Abylai khan avenue, 115',
                'type_id' => 3,
                'city_id' => 1,
                'ave_check_id' => 1,
            ],
        ];
        foreach ($establishments as $establishment){
            $est = new Establishment();
            $est->name = $establishment['name'];
            $est->description = $establishment['description'];
            $est->address = $establishment['address'];
            $est->type_id = $establishment['type_id'];
            $est->city_id = $establishment['city_id'];
            $est->ave_check_id = $establishment['ave_check_id'];
            $est->save();
        }

    }
}
