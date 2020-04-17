<?php

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Hookah', 'Wi-Fi', 'Karaoke', 'VIP zones', 'Highchairs', 'Parking', 'Background music', 'Live music',
            'Animators', 'Business lunches'];
        $slugs = ['hookah', 'wi_fi', 'karaoke', 'vip_zones', 'highchairs', 'parking', 'background_music', 'live_music',
            'animators', 'business_lunches'];
        for ($i = 0; $i < sizeof($names); $i++) {
            $feature = new Feature();
            $feature->name = $names[$i];
            $feature->slug = $slugs[$i];
            $feature->save();
        }
    }
}
