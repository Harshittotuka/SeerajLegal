<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 // database/seeders/AdminSeeder.php
public function run()
{
    \App\Models\Admin::create([
        'name' => 'Admin User',
        'email' => '1',
        'password' => bcrypt('1'),
    ]);
}
}
