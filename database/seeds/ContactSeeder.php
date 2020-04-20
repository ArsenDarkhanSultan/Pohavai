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
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $contacts = new Contacts();
                $contacts->est_id = $i + 1;
                $contacts->number1 = '+77472327373';
                $contacts->number2 = '+77472327474';
                $contacts->instagram = 'https://www.instagram.com/barbequebybekirchef/?hl=ru';
                $contacts->website = 'www.jetbrains.com';
                $contacts->save();
            }
        }
    }
}
