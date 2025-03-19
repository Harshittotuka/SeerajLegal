<?php

namespace Database\Seeders;

// database/seeders/AdminSeeder.php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Define custom email prefixes
        $emailPrefixes = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];

        foreach ($emailPrefixes as $prefix) {
            Admin::create([
                'name' => $faker->name,
                'email' => "{$prefix}@gmail.com", // Generate emails like a@gmail.com, b@gmail.com, etc.
                'password' => Hash::make('1234'), // Hashed password for security
                'phone' => $faker->phoneNumber,
                'profile_image' => $faker->imageUrl(),
                'type' => $faker->randomElement(['Admin', 'Superadmin']),
            ]);
        }
        Admin::create([
            'name' => 'Harshit ',
            'email' => '1',
            'password' => Hash::make('1'), // Hashed password
            'phone' => $faker->phoneNumber,
            'profile_image' => $faker->imageUrl(),
            'type' => 'Superadmin',
        ]);
    }
}
