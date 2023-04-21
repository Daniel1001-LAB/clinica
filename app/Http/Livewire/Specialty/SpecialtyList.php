<?php

namespace App\Http\Livewire\Specialty;

use Livewire\Component;

class SpecialtyList extends Component
{

    public $specialties=[];
    protected $listeners=['reload'=>'reload'];
    public function reload(){
        $this->render();
    }

    public function render()
    {
        $this->specialties = auth()->user()->specialties;
        return view('livewire.specialty.specialty-list');
    }


}
