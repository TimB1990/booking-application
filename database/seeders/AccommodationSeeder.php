<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Seeder;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acc = Accommodation::create([
            'name' => 'Pullmann Hotel',
            'domain' => 'pullmann',
            'location' => 'Pull City',
            'description' => 'Great hotel in the middle of central district',
            'stars' => 3,
            'guests_rating' => '7.5',
            'residences' => 18,
            'meeting_rooms' => 2
        ]);

        $userId = 1;

        $acc->users()->attach($userId);
    }
}
