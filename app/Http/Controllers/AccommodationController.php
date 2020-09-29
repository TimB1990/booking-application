<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    /*public function __construct(){
        $this->middleware('auth');
    }*/

    public function indexByAuth($user_id){

        // check whether given user id is not authenticated
        if(!(Auth::id() == $user_id)){
            return redirect('login');
        }

        // retrieve accommodations, user's fullname via authenticated user
        $user = Auth::user();
        $name = $user->name;
        $accommodations = $user->accommodations;

        // return to view with retrieved data
        return view('pages.select-acc', [
            'name' => $name,
            'accommodations' => $accommodations
        ]);
    }

    public function index(){

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Accommodation $accommodation)
    {
        //
    }


    public function edit(Accommodation $accommodation)
    {
        //
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        //
    }

    public function destroy(Accommodation $accommodation)
    {
        //
    }
}
