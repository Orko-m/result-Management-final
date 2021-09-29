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

            'name' =>"admin",
            'email' =>"admin@gmail.com",
            'role' =>"1",
            'password' => Hash::make("12345678"),
        ]);

        User::create([

            'name' =>"manager",
            'email' =>"manager@gmail.com",
            'role' =>"2",
            'password' => Hash::make("12345678"),
        ]);

        User::create([

            'name' =>"hrmanager",
            'email' =>"hrmanager@gmail.com",
            'role' =>"3",
            'password' => Hash::make("12345678"),
        ]);

        User::create([

            'name' =>"employee",
            'email' =>"employee@gmail.com",
            'role' =>"0",
            'password' => Hash::make("12345678"),
        ]);
        
    }
}
