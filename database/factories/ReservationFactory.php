<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {

        $d = strtotime("+1 week");
        $checkinDate = date("Y-m-d", $d);
        $checkoutDate = date("Y-m-d", strtotime("+3 days", $d));


        return [
            'accommodation_id' => 1,
            'guest_id' => 0,
            'invoice_id' => 0,
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
