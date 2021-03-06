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
        $accommodation = Accommodation::where('domain', $domain)->first();

        // get collection of serviceable types that belong to accommodation
        $residences = $accommodation->residences;
        $meetingRooms = $accommodation->meetingRooms;

        $services = [
            'services' => Service::all(),
            'accommodation' => [],
            'residences' => [],
            'meetingrooms' => []
        ];

        // retrieve services of each polymorphic relation and push them to services. 
        if($accommodation->services->count() > 0){
            $services['accommodation'] = $accommodation->services;
        }
      
        foreach($residences as $res){
            if($res->services->count() > 0){
                array_push($services['residences'], $res->services);
            }   
        }

        foreach($meetingRooms as $meetingRoom){
            if($meetingRoom->services->count() > 0){
                array_push($services['meetingrooms'], $meetingRoom->services);
            }  
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
