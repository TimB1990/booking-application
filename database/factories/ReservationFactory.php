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
        // $currentDate = date('Y-m-d');
        // $checkinDate = $this->faker->dateTimeBetween($currentDate, strtotime('+1 week', strtotime($currentDate)));

        $d = strtotime("+1 week");
        $checkinDate = date("Y-m-d", $d);
        $checkoutDate = date("Y-m-d", strtotime("+3 days", $d));


        return [
            'accommodation_id' => 1,
            'guest_id' => 0,
            'check_in' => $checkinDate,
            'check_out' => $checkoutDate,
            'adults' => 2,
            'children' => $this->faker->randomElement([1,2]),
            'babies' => $this->faker->randomElement([0,1]),
            'comment' => $this->faker->sentence,
            'online_payment' => true
        ];
    }
}

// strtotime('+3 days', strtotime($checkinDate))
