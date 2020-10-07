<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Residence;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class ServiceController extends Controller
{
    public function index($domain)
    {
        // retrieve id of domain
        $accommodation = Accommodation::where('domain', $domain)->get();
        $acc_id = $accommodation[0]->id;

        // retrieve residences by retrieved id
        $services = Service::where('accommodation_id', $acc_id)->get();

        // return view with residences data
        return view('pages.residences', [
            'accommodation' => $accommodation,
            'services' => $services,
            'title' => 'services'
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

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        //
    }

    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
