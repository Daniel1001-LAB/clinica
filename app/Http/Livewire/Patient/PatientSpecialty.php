<?php

namespace App\Http\Livewire\Patient;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class PatientSpecialty extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;



    public function render()
    {
        $search = '%'.$this->search.'%';
        $specialties = Specialty::orderBy('name')->where('name', 'like', $search)->paginate(9);
        return view('livewire.patient.patient-specialty',['specialties'=> $specialties]);
    }
}
