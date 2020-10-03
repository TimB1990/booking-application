<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Seeder;

class AccommodationSeeder extends Seeder
{

    public function run()
    {
        // references to factory
        $acc = Accommodation::factory()->create();
        $userId = 1;
        $acc->users()->attach($userId);
    }
}
