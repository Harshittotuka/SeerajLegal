<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name' => 'John Doe',
                'designation' => 'Senior Advocate',
                'area_of_practice' => json_encode(['Civil Law', 'Corporate Law']),
                'adr_services' => json_encode(['Arbitration', 'Mediation']),
                'all_rounder' => true,
                'type' => 'Advocate',
                'email' => 'johndoe@example.com',
                'phone' => '9876543210',
                'experience' => json_encode(['10 years in High Court', '5 years in Supreme Court']),
                'education' => json_encode(['LLB - Harvard University', 'LLM - Oxford University']),
                'awards' => json_encode(['Best Lawyer 2020', 'Top Arbitrator 2022']),
                'socials' => json_encode(['linkedin' => 'https://linkedin.com/in/johndoe', 'twitter' => 'https://twitter.com/johndoe']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'designation' => 'Corporate Lawyer',
                'area_of_practice' => json_encode(['Corporate Law', 'Tax Law']),
                'adr_services' => json_encode(['Negotiation', 'Mediation']),
                'all_rounder' => false,
                'type' => 'Lawyer',
                'email' => 'janesmith@example.com',
                'phone' => '9876543211',
                'experience' => json_encode(['7 years in Corporate Law', '3 years as Legal Advisor']),
                'education' => json_encode(['LLB - Yale University']),
                'awards' => json_encode(['Corporate Lawyer of the Year 2021']),
                'socials' => json_encode(['linkedin' => 'https://linkedin.com/in/janesmith']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robert Brown',
                'designation' => 'Retired Judge',
                'area_of_practice' => json_encode(['Criminal Law', 'Family Law']),
                'adr_services' => json_encode(['Arbitration', 'Conciliation']),
                'all_rounder' => true,
                'type' => 'Retired Judge',
                'email' => 'robertbrown@example.com',
                'phone' => '9876543212',
                'experience' => json_encode(['20 years as District Judge', '5 years as High Court Judge']),
                'education' => json_encode(['LLB - Cambridge University']),
                'awards' => json_encode(['Excellence in Justice Award 2019']),
                'socials' => json_encode(['linkedin' => 'https://linkedin.com/in/robertbrown']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
