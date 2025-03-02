<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            ['Name' => 'John Doe', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Jane Smith', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Michael Johnson', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Emily Brown', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'David Wilson', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Sarah Davis', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'James Miller', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Olivia Garcia', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Daniel Martinez', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Sophia Rodriguez', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Matthew Hernandez', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Emma Lopez', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Christopher Gonzalez', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Ava Perez', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Andrew Taylor', 'Membership_Type' => 'Platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Mia Anderson', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Joseph Thomas', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Abigail Moore', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'William Jackson', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Elizabeth Martin', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Alexander Lee', 'Membership_Type' => 'Platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Ella White', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Ryan Harris', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Grace Clark', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Nathan Lewis', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Chloe Walker', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Samuel Hall', 'Membership_Type' => 'Platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Lily Young', 'Membership_Type' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Benjamin Allen', 'Membership_Type' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Zoe King', 'Membership_Type' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
