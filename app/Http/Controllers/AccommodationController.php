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

    public function index(Request $request)
    {

        $user = User::find($request->query('user'));


        $accommodations = $user->accommodations;

        $data = [
            'name' => $user->name,
            'roles' => $user->roles,
            'accommodations' => []
        ];

        foreach ($accommodations as $acc){
            array_push($data['accommodations'], $acc);
        }

        return response()->json($data);

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
