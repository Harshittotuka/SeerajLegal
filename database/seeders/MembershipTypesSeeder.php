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
            ['membership_type' => 'basic','priority' => 1 ,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['membership_type' => 'premium','priority' => 2 ,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['membership_type' => 'gold','priority' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['membership_type' => 'platinum','priority'=> 4 , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
