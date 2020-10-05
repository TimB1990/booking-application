<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;

class GuestController extends Controller
{

    public function index($domain)
    {
        // retrieve accommodation information
        $accommodation = Accommodation::where('domain', $domain)->get();
        $acc_id = $accommodation[0]->id;

        // retrieve guests that have reservation on current accommodation
        $guests = Guest::whereHas('reservations', function (Builder $query) use ($acc_id) {
            $query->where('accommodation_id', $acc_id);
        })->get();

        // return view with guests data
        return view('pages.guests', [
            'accommodation' => $accommodation,
            'guests' => $guests,
            'title' => 'guests'
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


    public function show(Guest $guest)
    {
        //
    }


    public function edit(Guest $guest)
    {
        //
    }


    public function update(Request $request, Guest $guest)
    {
        //
    }


    public function destroy(Guest $guest)
    {
        //
    }
}
