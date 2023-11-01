<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'superadmin@gmail.com',
            'name' => 'superadmin',
            'password' => Hash::make('password')
        ]);

        User::create([
            'email' => 'user@gmail.com',
            'name' => 'user',
            'password' => Hash::make('password')
        ]);
    }
}
