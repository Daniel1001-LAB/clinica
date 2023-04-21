<?php

namespace App\Http\Livewire\Doctor;

use Livewire\Component;

class CurriculumController extends Component
{
    public function render()
    {
        return view('livewire.doctor.curriculum-controller')->layout('layouts.doctor');
    }
}
