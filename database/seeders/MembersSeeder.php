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
            ['Name' => 'John Doe', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Jane Smith', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Michael Johnson', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Emily Brown', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'David Wilson', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Sarah Davis', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'James Miller', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Olivia Garcia', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Daniel Martinez', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Sophia Rodriguez', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Matthew Hernandez', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Emma Lopez', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Christopher Gonzalez', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Ava Perez', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Andrew Taylor', 'MembershipType' => 'Platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Mia Anderson', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Joseph Thomas', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Abigail Moore', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'William Jackson', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Elizabeth Martin', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Alexander Lee', 'MembershipType' => 'Platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Ella White', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Ryan Harris', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Grace Clark', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Nathan Lewis', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Chloe Walker', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Samuel Hall', 'MembershipType' => 'Platinum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Lily Young', 'MembershipType' => 'Basic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Benjamin Allen', 'MembershipType' => 'Premium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Name' => 'Zoe King', 'MembershipType' => 'Gold', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
