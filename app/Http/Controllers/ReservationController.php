<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\MeetingRoom;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ReservationController extends Controller
{

    public function index(Request $request, $domain)
    {
        // retrieve accommodation information
        $accommodation = Accommodation::where('domain', $domain)->first();
        $acc_id = $accommodation->id;

        // retrieve query string parameters
        $week = $request->query('week');
        $year = $request->query('year');
        $subject = $request->query('subject');
        $days = 14;

        // retrieve start date of given week
        $weekStart = new DateTime();

        // set query string values as year and week
        $weekStart->setIsoDate($year, $week);

        // calculate last day of next given week
        $followingWeekEnd = date('Y-m-d', strtotime($weekStart->format('Y-m-d') . ' +' . $days . ' days'));

        // get reservations
        $reservations = Reservation::where([
            ['accommodation_id', $acc_id],
            ['check_in', '>=', $weekStart],
            ['check_out', '<=', $followingWeekEnd]
        ])->get();

        // set values for data structure
        $amount = 0;

        if ($subject == "meetingrooms") {
            $amount = $accommodation->meetingRooms->count();
        }

        if ($subject == "assets") {
            $amount = $accommodation->assets->count();
        }

        if ($subject == "residences") {
            $amount = $accommodation->residences->count();
        }

        // initialize data structure
        $cells = [];

        // create data structure
        for ($i = 0; $i < $amount; $i++) {
            for ($d = 0; $d < $days; $d++) {

                // define cell date
                $no = $i + 1;
                $cellDate = date('Y-m-d', strtotime($weekStart->format('Y-m-d') . ' +' . $d . 'days'));

                // define cell
                $cell = [
                    'no' => $i + 1,
                    'day' => $d + 1,
                    'date' => $cellDate,
                    'taken' => false
                ];

                foreach ($reservations as $resv) {
                    if (!empty($resv[$subject])) {
                        foreach ($resv[$subject] as $sub) {
                            // dd([
                            //     'date' => $cellDate,
                            //     'checkin' => $resv->check_in,
                            //     'checkout' => $resv->check_out,
                            //     'date_is_earlier_than_checkin' => ($cellDate <= strtotime($resv->check_in))
                            // ]);

                            if ($sub->id == $no && $cellDate >= $resv->check_in && $cellDate <= $resv->check_out) {
                                $cell['taken'] = true;
                            }
                        }
                    }
                }

                array_push($cells, $cell);
            }
        }


        // return view with reservations data
        return view('pages.reservations', [
            'accommodation' => $accommodation,
            'cells' => $cells,
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
