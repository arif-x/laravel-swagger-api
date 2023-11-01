<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $type = ['Telp', 'Whatsapp', 'Telegram'];

        for ($i=0; $i < 100; $i++) { 
            $random = array_rand($type);
            Contact::create([
                'type' => $type[$random],
                'name' => $faker->name,
                'contact' => $faker->phoneNumber
            ]);
        }
    }
}
