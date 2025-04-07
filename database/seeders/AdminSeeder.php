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
                'email' => "{$prefix}@gmail.com",
                'password' => Hash::make('1234'),
                'phone' => $faker->phoneNumber,
                'profile_image' => $faker->imageUrl(),
                'type' => $faker->randomElement(['Admin', 'Superadmin']),
            ]);
        }

        // Existing custom admin
        Admin::create([
            'name' => 'Harshit',
            'email' => '1',
            'password' => Hash::make('1'),
            'phone' => $faker->phoneNumber,
            'profile_image' => $faker->imageUrl(),
            'type' => 'Superadmin',
        ]);

        // New Admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => $faker->phoneNumber,
            'profile_image' => $faker->imageUrl(),
            'type' => 'Admin',
        ]);

        // New SuperAdmin
        Admin::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => $faker->phoneNumber,
            'profile_image' => $faker->imageUrl(),
            'type' => 'Superadmin',
        ]);
    }
}
