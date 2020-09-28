<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\User;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }

    // after Login
    public function listAfterLogin(Request $request)
    {

        $user = User::find($request->query('user'));
        $token = $request->bearerToken();


        $accommodations = $user->accommodations;

        $data = [
            'name' => $user->name,
            'token' => $token,
            'roles' => $user->roles,
            'accommodations' => []
        ];

        foreach ($accommodations as $acc){
            array_push($data['accommodations'], [
                'id' => $acc->id, 
                'domain' => $acc->domain, 
                'name' => $acc->name
            ]);
        }

        // return view('pages.select-acc')->with(compact($data));
        return response()->view('pages.select-acc', $data, 200);

    }

    public function retrieveAfterLogin(Request $request){

        // should response Http::withToken 

    }

    // regular CRUD

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
