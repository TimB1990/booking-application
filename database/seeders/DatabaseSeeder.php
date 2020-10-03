<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GuestSeeder;
use Database\Seeders\ResidenceSeeder;
use Database\Seeders\AccommodationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AccommodationSeeder::class,
            ResidenceSeeder::class,
            GuestSeeder::class     
        ]);
    }
}
