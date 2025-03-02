<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomepageSeeder extends Seeder
{
    public function run()
    {
        DB::table('homepages')->insert([
            [
                'title' => 'Justice Made Accessible: faster and fairer',
                'para' => null,
                'points' => null,
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'We are here to Empower Justice',
                'para' => 'Seeraj Legal Relief Foundation is a non-government organization committed to resolving disputes cost-effectively, offering expert legal advice, and spreading legal awareness through educational programs.',
                'points' => json_encode(['Recognized Entity', 'Public Benefit Focus.', 'Trustworthy and Authentic']),
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Legal Registration',
                'para' => 'A Non-Governmental Organization registered under the Companies Act with CIN No. U94120RJ2024NPL093001.',
                'points' => null,
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Non-Profit Objective',
                'para' => 'Operates as a non-profit entity dedicated to resolving disputes amicably, fostering peaceful settlements, and spreading awareness.',
                'points' => null,
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Jurisdiction',
                'para' => 'Based in Rajasthan, India, with services available both locally and beyond through online and offline platforms.',
                'points' => null,
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ADR Services',
                'para' => 'Specializing in Alternative dispute resolution methods in contrast to conventional court proceedings',
                'points' => json_encode(['Arbitration', 'Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Meet Our Directors',
                'para' => null,
                'points' => null,
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Serving Every Corner of Rajasthan',
                'para' => 'We pride ourselves in providing legal solutions throughout the vast and diverse land of Rajasthan. From the capital city of Jaipur to the serene desert of Jaisalmer, we bring justice and consultancy to every corner of this beautiful state.',
                'points' => json_encode(['33+ Districts', '500+ Cities Covered', '24×7 Availability']),
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => null,
                'para' => null,
                'points' => json_encode(['+918107000333']),
                'status' => 'active',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
