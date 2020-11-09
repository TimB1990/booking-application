<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Guest;

class SearchGuests extends Component
{
    use WithPagination;
    public $search = '';


    public function render()
    {
        if(empty($this->search)){
            $this->emit('resetForm', true);
            return view('livewire.forms.search-guests');
        } 
        
        $searchTerm = '%' . $this->search . '%';
        return view('livewire.forms.search-guests', [
            'guests' => Guest::where('first_name', 'like', $searchTerm)->orWhere('last_name', 'like', $searchTerm)->paginate(10)
        ]);
    }
}
