<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accommodation_id' => '',
            'guest_id' => '',
            'check-in' => '',
            'check-out' => '',
            'adults' => 2,
            'children' => $this->faker->shuffle(1,2),
            'babies' => $this->faker->shuffle(0,1),
            'comment' => $this->faker->sentence(),
            'online-payment' => true
        ];
    }
}
