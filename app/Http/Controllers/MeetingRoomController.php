<?php

namespace App\Http\Controllers;

use App\Models\MeetingRoom;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class MeetingRoomController extends Controller
{

    public function index($domain)
    {
        // get accommodation id
        $accommodation = Accommodation::where('domain', $domain)->get();
        $acc_id = $accommodation[0]->id;

        // get meeting rooms
        $meetingRooms = MeetingRoom::where('accommodation_id', $acc_id)->get();

        // return view with meetingrooms data
        return view('pages.meeting-rooms', [
            'accommodation' => $accommodation,
            'meetingRooms' => $meetingRooms,
            'title' => 'Meeting rooms'
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


    public function show(MeetingRoom $meetingRoom)
    {
        //
    }


    public function edit(MeetingRoom $meetingRoom)
    {
        //
    }


    public function update(Request $request, MeetingRoom $meetingRoom)
    {
        //
    }

    public function destroy(MeetingRoom $meetingRoom)
    {
        //
    }
}
