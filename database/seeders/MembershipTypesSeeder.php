<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MembershipTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('membership_types')->insert([
            ['membership_type' => 'basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['membership_type' => 'premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['membership_type' => 'gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['membership_type' => 'platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
