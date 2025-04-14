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
                'S_id' => 0,
                'title' => 'Justice Made Accessible: faster and fairer',
                'para' => null,
                'points' => null,
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 1,
                'title' => 'We are here to Empower Justice',
                'para' => 'Seeraj Legal Relief Foundation is a non-government organization committed to resolving disputes cost-effectively, offering expert legal advice, and spreading legal awareness through educational programs.',
                'points' => json_encode(['Recognized Entity', 'Public Benefit Focus.', 'Trustworthy and Authentic']),
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                
                'S_id' => 2,
                'title' => 'Legal Registration',
                'para' => 'A Non-Governmental Organization registered under the Companies Act with CIN No. U94120RJ2024NPL093001.',
                'points' => null,
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 3,
                'title' => 'Non-Profit Objective',
                'para' => 'Operates as a non-profit entity dedicated to resolving disputes amicably, fostering peaceful settlements, and spreading awareness.',
                'points' => null,
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 4,
                'title' => 'Jurisdiction',
                'para' => 'Based in Rajasthan, India, with services available both locally and beyond through online and offline platforms.',
                'points' => null,
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 5,
                'title' => 'ADR Services',
                'para' => 'Specializing in Alternative dispute resolution methods in contrast to conventional court proceedings',
                'points' => json_encode(['Arbitration', 'Conciliation', 'Mediation', 'Lok Adalat', 'Negotiation']),
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 7,
                'title' => 'Meet Our Directors',
                'para' => null,
                'points' => null,
                'flag' => 'enabled',
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 8,
                'title' => 'Serving Every Corner of Rajasthan',
                'para' => 'We pride ourselves in providing legal solutions throughout the vast and diverse land of Rajasthan. From the capital city of Jaipur to the serene desert of Jaisalmer, we bring justice and consultancy to every corner of this beautiful state.',
                'points' => json_encode(['33+ Districts', '500+ Cities Covered', '24×7 Availability']),
                'flag' => 'enabled',
                'image' => (['assets/img/Rajasthan.webp']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

    }
}
