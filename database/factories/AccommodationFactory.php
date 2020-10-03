<?php

namespace Database\Factories;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AccommodationFactory extends Factory
{

    protected $model = Accommodation::class;

    public function definition()
    {
        return [
            'name' => 'Puckmann Hotel',
            'domain' => 'puckmann',
            'location' => 'Puck City',
            'description' => 'Great hotel in the middle of central district',
            'stars' => 3,
            'guests_rating' => '7.5',
            'residences' => 18,
            'meeting_rooms' => 2
        ];
    }
}

/*
        $acc = Accommodation::create([
            'name' => 'Puckmann Hotel',
            'domain' => 'puckmann',
            'location' => 'Puck City',
            'description' => 'Great hotel in the middle of central district',
            'stars' => 3,
            'guests_rating' => '7.5',
            'residences' => 18,
            'meeting_rooms' => 2
        ]);

        $userId = 1;

        $acc->users()->attach($userId);
*/
