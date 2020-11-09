<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddReservation extends Component
{
    public $search = '';
    
    public $guest = [
        'fname' => '',
        'lname' => '',
        'dob' => '',
        'email' => '',
        'phone' => '',
        'country' => '',
        'zip' => '',
        'nr' => '',
        'street' => '',
        'city' => ''
    ];


    public function mount(){
        // do something
    }

    public function render()
    {
        return view('livewire.add-reservation');
    }
}
