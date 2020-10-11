<?php

namespace Database\Factories;

use App\Models\MeetingRoom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MeetingRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MeetingRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $area_m2 = 50.0;
        $price_per_m2 = 2.40;

        return [
            'accommodation_id' => 1,
            // 'room_nr' => $this->faker->unique()->numberBetween(1,2),
            'alias' => $this->faker->word . ' room',
            'max_seats' => 30,
            'area_m2' => $area_m2,
            'status' => 'free',
            'price_per_m2' => $price_per_m2,
            'price_per_dp' => $area_m2 * $price_per_m2
        ];
    }
}
