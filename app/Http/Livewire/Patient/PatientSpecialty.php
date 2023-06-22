<?php

namespace App\Http\Livewire\Patient;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class PatientSpecialty extends Component
{
    use WithPagination;
    public $search;

    public function selectDate($doctorId, $specialtyId){
        $this->emitTo('patient.patient-date', 'selectDate', $doctorId, $specialtyId);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $specialties = Specialty::orderBy('name')->where('name', 'like', $search)->paginate(8);
        return view('livewire.patient.patient-specialty',['specialties'=> $specialties]);
    }
}
