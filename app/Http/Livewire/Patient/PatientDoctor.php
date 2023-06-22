<?php

namespace App\Http\Livewire\Patient;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithPagination;

class PatientDoctor extends Component
{
    use WithPagination;
    public $search="";


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
        $doctors = Doctor::orderBy('name')->where('name','like',$search)->paginate(4);

        return view('livewire.patient.patient-doctor',['doctors'=>$doctors]);
    }
}
