<?php

namespace App\Http\Controllers;

use App\Models\Residence;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class ResidenceController extends Controller
{

    public function index($domain)
    {
        // retrieve id of domain
        $accommodation = Accommodation::where('domain', $domain)->first();
        $acc_id = $accommodation->id;

        // retrieve residences by retrieved id
        $residences = Residence::where('accommodation_id', $acc_id)->orderBy('id', 'asc')->get();

        // return view with residences data
        return view('pages.residences', [
            'accommodation' => $accommodation,
            'residences' => $residences,
            'title' => 'Residences'
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


    public function show(Residence $residence)
    {
        //
    }


    public function edit(Residence $residence)
    {
        //
    }


    public function update(Request $request, Residence $residence)
    {
        //
    }

    public function destroy(Residence $residence)
    {
        //
    }
}
