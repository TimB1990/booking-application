<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class ReservationController extends Controller
{

    public function index(Request $request, $domain)
    {
        // retrieve query string parameters
        $week = $request->input('week');
        $year = $request->input('year');

        

        // retrieve start date of given week
        $weekStart = new DateTime();
        $weekStart->setIsoDate($year, $week);

        // calculate last day of next given week
        $followingWeekEnd = date('Y-m-d', strtotime($weekStart->format('Y-m-d') . ' +14 days'));
        
        // retrieve accommodation information
        $accommodation = Accommodation::where('domain', $domain)->get();
        $acc_id = $accommodation[0]->id;

        // get reservations
        // $reservations = Reservation::where('accommodation_id', $acc_id)->andWhere('check_in', '>=', $weekStart)->get();

        $reservations = Reservation::where([
            ['accommodation_id', $acc_id],
            ['check_in', '>=', $weekStart],
            ['check_out', '<=', $followingWeekEnd]
        ])->get();

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
