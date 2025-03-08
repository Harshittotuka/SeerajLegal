<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('about_us')->insert([
            [
                'S_id' => 1,
                'S_order' => 1,
                'title' => 'We are here to Empower Justice',
                'para' => 'Seeraj Legal Relief Foundation is a non-government organization committed to resolving disputes cost-effectively, offering expert legal advice, and spreading legal awareness through educational programs.',
                'points' => json_encode(['Recognized Entity', 'Public Benefit Focus', 'Trustworthy and Authentic']),
                'flag' => 'enabled', // default value enabled
                'image' => json_encode(['image1url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 2,
                'S_order' => 2,
                'title' => 'Legal Registration',
                'para' => 'A Non-Governmental Organization registered under the Companies Act with CIN No. U94120RJ2024NPL093001.',
                'points' => null,
                'flag' => 'enabled', // default value enabled
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 3,
                'S_order' => 3,
                'title' => 'Non-Profit Objective',
                'para' => 'Operates as a non-profit entity dedicated to resolving disputes amicably, fostering peaceful settlements, and spreading awareness.',
                'points' => null,
                'flag' => 'enabled', // default value enabled
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 4,
                'S_order' => 4,
                'title' => 'Jurisdiction',
                'para' => 'Based in Rajasthan, India, with services available both locally and beyond through online and offline platforms.',
                'points' => null,
                'flag' => 'enabled', // default value enabled
                'image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 5,
                'S_order' => 5,
                'title' => 'We are here to provide legal Services',
                'para' => 'All people are equal before the law. A good attorney is what makes a difference. Lorem aliquam sit amet auctor the done vitae risus duise in the miss ranish fermen.',
                'points' => json_encode(['Rajan Sharma', 'Seema Sharma']),
                'flag' => 'enabled', // default value enabled
                'image' => json_encode(['image3_url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 6,
                'S_order' => 6,
                'title' => 'Awards & Recognitions',
                'para' => null,
                'points' => null,
                'flag' => 'enabled', // default value enabled
                'image' => json_encode(['image4_url', 'image5_url', 'image6_url', 'image7_url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'S_id' => 7,
                'S_order' => 7,
                'title' => 'Meet Our Directors',
                'para' => null,
                'points' => null,
                'flag' => 'enabled', // default value enabled
                'image' => json_encode(['image9_url', 'image10_url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
