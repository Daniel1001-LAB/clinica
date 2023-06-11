<?php

namespace App\Http\Livewire\Patient;

use App\Models\Interview;
use App\Models\User;
use Livewire\Component;

class PatientInterviewResume extends Component
{
    public $interview, $patient;

    public function mount(Interview $interview){
        $this->interview = $interview;
        $this->patient = User::find($interview->patient_id);
    }


    public function render()
    {
        $patient_symptoms = $this->patient->symptoms()->wherePivot('interview_id', $this->interview->id)->paginate(10);
        return view('livewire.patient.patient-interview-resume', compact('patient_symptoms'));
    }
}
