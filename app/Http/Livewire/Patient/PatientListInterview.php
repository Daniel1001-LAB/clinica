<?php

namespace App\Http\Livewire\Patient;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PatientListInterview extends Component
{
    use WithPagination;
    public $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        $interviews = $this->user->interviews()->paginate(3);
        return view('livewire.patient.patient-list-interview', compact('interviews'));
    }
}
