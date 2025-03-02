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
                'name' => 'Arun Singh Shekhawat',
                'designation' => 'Practicing Advocate, Rajasthan High Court',
                'area_of_practice' => json_encode(['Civil Law', 'Corporate Law']), // JSON Array
                'adr_services' => json_encode(['Arbitrator', 'Negotiator']), // JSON Array
                'all_rounder' => false,
                'type' => 'Advocate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'K.R. Sharma (Retd. CJM)',
                'designation' => 'Retired Chief Judicial Magistrate & District & Session Judge',
                'area_of_practice' => json_encode(['Criminal Law', 'Family Law', 'Arbitration']),
                'adr_services' => json_encode(['Arbitrator', 'Conciliator', 'Presiding Officer']),
                'all_rounder' => true,
                'type' => 'Retired Judge',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hemant Ruthala',
                'designation' => 'Practicing Advocate, Rajasthan High Court',
                'area_of_practice' => json_encode(['Corporate Law', 'Civil Law']),
                'adr_services' => json_encode(['Arbitrator', 'Negotiator', 'Mediator']),
                'all_rounder' => false,
                'type' => 'Advocate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rajesh Jain',
                'designation' => 'Practicing Advocate, Rajasthan High Court',
                'area_of_practice' => json_encode(['Corporate Law', 'Civil Law']),
                'adr_services' => json_encode(['Arbitrator', 'Negotiator']),
                'all_rounder' => false,
                'type' => 'Advocate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mrs. Manju Singh Chundawat',
                'designation' => 'Practicing Advocate, Rajasthan High Court',
                'area_of_practice' => json_encode(['Civil Law', 'Criminal Law', 'Family Law']),
                'adr_services' => json_encode(['Arbitrator', 'Negotiator', 'Mediator']),
                'all_rounder' => true,
                'type' => 'Advocate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Naveen Sharma',
                'designation' => 'Practicing Advocate, CMM Court',
                'area_of_practice' => json_encode(['Corporate Law', 'Civil Law']),
                'adr_services' => json_encode(['Arbitrator', 'Mediator']),
                'all_rounder' => false,
                'type' => 'Advocate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jai Prakash Sharma',
                'designation' => 'Practicing Advocate, CMM Court, Rajasthan',
                'area_of_practice' => json_encode(['Criminal Law']),
                'adr_services' => json_encode([]), // No ADR services
                'all_rounder' => false,
                'type' => 'Advocate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ashok Sharma',
                'designation' => 'Retired District & Session Judge, Rajasthan',
                'area_of_practice' => json_encode(['Criminal Law', 'Family Law', 'Corporate Law']),
                'adr_services' => json_encode(['Arbitrator', 'Conciliator', 'Presiding Officer']),
                'all_rounder' => true,
                'type' => 'Retired Judge',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ramesh Chand Sharma',
                'designation' => 'Retired District & Session Judge, Rajasthan',
                'area_of_practice' => json_encode(['Criminal Law', 'Family Law', 'Corporate Law']),
                'adr_services' => json_encode(['Arbitrator', 'Conciliator', 'Presiding Officer']),
                'all_rounder' => true,
                'type' => 'Retired Judge',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
