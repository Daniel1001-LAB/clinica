<?php

namespace App\Http\Livewire\Patient;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithPagination;

class PatientDoctor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search="";
    public function render()
    {


        $search = '%'.$this->search.'%';
        $doctors = Doctor::orderBy('name')->where('name','like',$search)->paginate(3);

        return view('livewire.patient.patient-doctor',['doctors'=>$doctors]);
    }
}
