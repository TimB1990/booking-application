<?php

namespace Database\Seeders;

use App\Models\Residence;
use Illuminate\Database\Seeder;

class ResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Residence::factory()->count(18)->create();
    }
}
