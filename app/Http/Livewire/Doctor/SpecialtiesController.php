<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;

class SpecialtiesController extends Component
{
    public function render()
    {
        return view('livewire.doctor.specialties-controller')->layout('layouts.doctor');
    }
}
