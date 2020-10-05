<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class ReservationController extends Controller
{

    public function index($domain)
    {
        // retrieve accommodation information
        $accommodation = Accommodation::where('domain', $domain)->get();
        $acc_id = $accommodation[0]->id;

        // get reservations
        $reservations = Reservation::where('accommodation_id', $acc_id)->get();

        // return view with reservations data
        return view('pages.reservations',[
            'accommodation' => $accommodation,
            'reservations' => $reservations,
            'title' => 'Reservations'
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Reservation $reservation)
    {
        //
    }


    public function edit(Reservation $reservation)
    {
        //
    }


    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    public function destroy(Reservation $reservation)
    {
        //
    }
}
