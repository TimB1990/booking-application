<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\User;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
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
