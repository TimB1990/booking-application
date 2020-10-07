<?php

namespace Database\Factories;

use App\Models\Residence;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResidenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Residence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['comfort','luxery']);
        $price_per_night = $type == 'luxery' ? 85.00 : 55.00;
        $area_m2 = $type == 'luxery' ? 50.0 : 25.0;

        return [
            'accommodation_id' => 1,
            'residence_nr' => $this->faker->unique()->numberBetween(1,18),
            'area_m2' => $area_m2,
            'status' => 'free',
            'type' => $type,
            'price_per_night' => $price_per_night
        ];
    }
}
