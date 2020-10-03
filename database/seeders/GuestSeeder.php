<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\Residence;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Guest::factory()->create();

        // Reservation::factory()->hasResidences(1, ['taken' => true])->create();

        // WRONG!!
        Reservation::factory()->forGuest()->create()->each(function( Reservation $reservation){
            DB::table('reservables')->insert([
                'reservation_id' => $reservation->id,
                'reservable_type' => Residence::class,
                'reservable_id' => 1
            ]);

        });





    }
}
