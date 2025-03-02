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
                'title' => 'We are here to Empower Justice',
                'para' => 'Seeraj Legal Relief Foundation is a non-government organization committed to resolving disputes cost-effectively, offering expert legal advice, and spreading legal awareness through educational programs.',
                'points' => json_encode(['Recognized Entity', 'Public Benefit Focus', 'Trustworthy and Authentic']),
                'status' => 'active',
                'image' => json_encode(['image1url']),
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
                'title' => 'We are here to provide legal Services',
                'para' => 'All people are equal before the law. A good attorney is what makes a difference. Lorem aliquam sit amet auctor the done vitae risus duise in the miss ranish fermen.',
                'points' => json_encode(['Rajan Sharma', 'Seema Sharma']),
                'status' => 'active',
                'image' => json_encode(['image3_url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Awards & Recognitions',
                'para' => null,
                'points' => null,
                'status' => 'active',
                'image' => json_encode(['image4_url', 'image5_url', 'image6_url', 'image7_url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Meet Our Directors',
                'para' => null,
                'points' => null,
                'status' => 'active',
                'image' => json_encode(['image9_url', 'image10_url']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
