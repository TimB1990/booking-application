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

        $services = [
            'accommodation' => [],
            'residences' => [],
            'meetingrooms' => []
        ];

        // retrieve services of each polymorphic relation and push them to services. 
        $services['accommodation'] = $accommodation->services;

        $residences = $accommodation->residences;
        foreach($residences as $res){
            array_push($services['residences'], $res->services);
        }

        $meetingRooms = $accommodation->meetingRooms;
        foreach($meetingRooms as $meetingRoom){
            array_push($services['meetingrooms'], $meetingRoom->services);
        }

        
        // return view with residences data
        return view('pages.services', [
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
