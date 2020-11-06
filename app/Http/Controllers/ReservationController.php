<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use Carbon\CarbonPeriod;
use App\Models\MeetingRoom;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Carbon;
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

        $date = new Carbon();
        $date->setIsoDate($year, $week);
        $weekStart = $date->startOfweek();

        // get reservations
        $reservations = Reservation::where([
            ['accommodation_id', $acc_id]
            // ,['check_in', '>=', $weekStart]
            // ,['check_out', '<=', $weekEnd]
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

        // $cellDate = $weekStart;

        // create data structure
        for ($i = 0; $i < $amount; $i++) {
            for ($d = 0; $d < $days; $d++) {

                $no = $i + 1;
                
                // Carbon::parse($cellDate)->addDays($d);
                $cellDate = Carbon::parse($weekStart)->addDay($d);

                // define cell
                $cell = [
                    'd' => $d,
                    'no' => $i + 1,
                    'date' => $cellDate->toDateTimeString(),
                    'taken' => false,
                    'resv' => []
                ];


                foreach ($reservations as $resv) {
                    if (empty($resv[$subject])) return;
                    

                    foreach ($resv[$subject] as $sub) {

                        // dd(CarbonPeriod::create($sub->pivot->check_in, Carbon::parse($sub->pivot->check_out)->addDays(1))->toArray());

                        if (!($sub->id == $no && $cellDate->between(Carbon::parse($sub->pivot->check_in)->subDays(1), $sub->pivot->check_out))) continue;

                        $cell['taken'] = true;

                        array_push($cell['resv'] , [
                            'id' => $resv->id,
                            'name' => $resv->guest->first_name[0] . '. ' . $resv->guest->last_name,
                            'check_in' => Carbon::parse($sub->pivot->check_in)->format('M j'),
                            'check_out' => Carbon::parse($sub->pivot->check_out)->format('M j')
                        ]);

                    } 
                }

                array_push($cells, $cell);
            }
        }

        // dd($cells);


        // return view with reservations data
        return view('pages.reservations', [
            'accommodation' => $accommodation,
            'cells' => $cells,
            'title' => 'Reservations'
        ]);
    }

    public function create($domain)
    {
        // retrieve accommodation information
        $accommodation = Accommodation::where('domain', $domain)->first();

        // return view
        return view ('pages.dash-reservation-form', [
            'accommodation' => $accommodation,
            'title' => 'Add Reservation'
        ]);
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
