<?php

namespace App\Http\Livewire\Forms;

use App\Models\Guest;
use Livewire\Component;

class AddGuest extends Component
{

    public $guest = [];
    public $resetForm = null;

    protected $listeners = ['insertFields', 'resetForm'];

    public function resetForm($bool){
        if(!$bool) return
        $this->resetForm = $bool; 
        $this->reset();
    }

    public function insertFields(Guest $guest){

        $this->guest = [
            'fname' => $guest->first_name,
            'lname' => $guest->last_name,
            'dob' => $guest->date_of_birth,
            'email' => $guest->email,
            'phone' => $guest->telephone,
            'country' => $guest->country,
            'zip' => $guest->postcode,
            'nr' => $guest->house_nr,
            'street' => $guest->street,
            'city' => $guest->city
        ];
    
    }

    public function render()
    {
        if(empty($guest)) return view ('livewire.forms.add-guest');

        return view('livewire.forms.add-guest', [
            'guest' => $this->guest,
            'resetForm' => $this->resetForm
        ]);
    }
}
