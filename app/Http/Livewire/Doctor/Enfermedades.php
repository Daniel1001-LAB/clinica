<?php

namespace App\Http\Livewire\Doctor;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Enfermedades extends Component
{
    public function render()
    {


        return view('livewire.doctor.enfermedades')->layout('layouts.doctor');
    }
}
