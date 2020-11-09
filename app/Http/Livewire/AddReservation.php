<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddReservation extends Component
{
    public $search = '';
    
    public function mount(){
        // do something
    }

    public function render()
    {
        return view('livewire.add-reservation');
    }
}
