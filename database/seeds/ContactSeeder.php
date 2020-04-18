<?php

use Illuminate\Database\Seeder;
use App\Models\Contacts;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 12; $i++){
            $contacts = new Contacts();
            $contacts->number1 = '+77472327373';
            $contacts->number1 = '+77472327474';
            $contacts->instagram = 'https://www.instagram.com/barbequebybekirchef/?hl=ru';
            $contacts->website = 'www.jetbrains.com';
            $contacts->save();
        }
    }
}
