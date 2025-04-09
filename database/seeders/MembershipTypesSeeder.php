<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MembershipTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('membership_types')->insert([['membershipType' => 'Basic', 'priority' => 1, 'price' => 499.0, 'duration' => '1 year', 'created_at' => now(), 'updated_at' => now()], ['membershipType' => 'Premium', 'priority' => 2, 'price' => 999.0, 'duration' => '1 year', 'created_at' => now(), 'updated_at' => now()], ['membershipType' => 'Gold', 'priority' => 3, 'price' => 1499.0, 'duration' => '1 year', 'created_at' => now(), 'updated_at' => now()], ['membershipType' => 'Platinum', 'priority' => 4, 'price' => 1999.0, 'duration' => '1 year', 'created_at' => now(), 'updated_at' => now()]]);
    }
}
