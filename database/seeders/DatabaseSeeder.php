<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(FaqSeeder::class);
        $this->call(MembersSeeder::class);
        // $this->call(HomepageSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(TopImagesSeeder::class);

        $this->call(AdminSeeder::class);
        $this->call([
            ContactsSeeder::class,
            MembershipTypesSeeder::class,
            PracticesSeeder::class,
            ServicesSeeder::class,
        
        ]);
        $this->call(TeamsSeeder::class);

    }
}
