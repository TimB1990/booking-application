<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
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
        $days = 7;

        // retrieve start date of given week
        $weekStart = new DateTime();

        // set query string values as year and week
        $weekStart->setIsoDate($year, $week);

        // reset time to 14:00
        $weekStart->setTime(0,0,0);

        // calculate last day of next given week
        // $WeekEnd = date('Y-m-d', strtotime($weekStart->format('Y-m-d') . ' +' . $days . ' days'));

        // get reservations
        $reservations = Reservation::where([
            ['accommodation_id', $acc_id]
            // ,['check_in', '>=', $weekStart]
            // ,['check_out', '<=', $WeekEnd]
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

                $no = $i + 1;

                // $cellDate = date('Y-m-d', strtotime($weekStart->format('Y-m-d') . ' +' . $d . 'days'));
                $cellDate = new DateTime($weekStart->format("Y-m-d H:i"));
                $cellDate->add(new DateInterval("P". $d . "D"));

                // define cell
                $cell = [
                    'no' => $i + 1,
                    'day' => $d + 1,
                    'date' => $cellDate,
                    'taken' => false,
                    'resv' => []
                ];

                foreach ($reservations as $resv) {
                    if (!empty($resv[$subject])) {
                        foreach ($resv[$subject] as $sub) {

                            $checkinDt = new DateTime($sub->pivot->check_in);

                            // for some weird reason subtracting 1D shows the beginning day
                            $checkinDt->sub(new DateInterval('P1D'));


                            $checkoutDt = new DateTime($sub->pivot->check_out);

                            if ($sub->id == $no && $cellDate > $checkinDt && $cellDate < $checkoutDt ) {

                                // dd([
                                //     'cell date' => $cellDate->format('Y-m-d H:i'),
                                //     'checkin' => $checkinDt,
                                //     'checkout' => $checkoutDt
                                // ]);

                                $cell['taken'] = true;

                                array_push($cell['resv'] , [
                                    'id' => $resv->id,
                                    'name' => $resv->guest->first_name[0] . '. ' . $resv->guest->last_name,
                                    'check_in' => date('m-d', strtotime($sub->pivot->check_in)),
                                    'check_out' => date('m-d', strtotime($sub->pivot->check_out)),
                                ]);
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
