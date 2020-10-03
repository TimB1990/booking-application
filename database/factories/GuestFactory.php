<?php

namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'insertion' => null,
            'last_name' => $this->faker->lastName,
            'country' => 'Netherlands',
            'postcode' => $this->faker->postcode,
            'house_nr' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
            'street' => $this->faker->streetName,
            'city' => $this->faker->city,
            'date_of_birth' => $this->faker->dateTimeBetween('1950-01-01','2002-01-01')->format('Y-m-d'),
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];
    }
}
