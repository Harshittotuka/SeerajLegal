<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'email' => 'seerajlegal@gmail.com',
            'address' => 'E-273, 2nd Floor, Lal Kothi Scheme, Barkat Nagar, Jaipur, Rajasthan, India, 302015',
            'phone_no' => '+91 8107000333',
            'phone_2' => null,
            'yrs_of_experience' => 1,
            'insta_link' => null,
            'facebook_link' => null,
            'youtube_link' => null,
            'twitter_link' => null,
            'whatsapp' => null,
            'linkedin' => null,
            'website_link' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
