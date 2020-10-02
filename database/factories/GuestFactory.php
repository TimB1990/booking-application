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
            'country' => $this->faker->country,
            'postcode' => $this->faker->postcode,
            'house_nr' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
            'street' => $this->faker->streetName,
            'city' => $this->faker->city,
            'date_of_birth' => $this->faker->dateTimeBetween('1920-01-01','2002-01-01')->format('Y/m/d'),
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];
    }
}

/*
// run model factory
factory(App\Admin::class, 3)->create()->each(function ($admin) {

    $admin->user()->save(

        // solved: https://laravel.com/docs/master/database-testing#using-factories (Overriding attributes)
        factory(App\User::class)->make([
              'userable_id' => $admin->id,
              'userable_type' => App\Admin::class
        ])
    );
});
*/
