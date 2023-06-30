<?php

namespace App\Http\Livewire\Patient;

use App\Models\File;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class PatientInfo extends Component
{
    use WithPagination;
    public $desde;
    public $hasta;
    protected $listeners =['actualizar'=>'actualizar'];

    public function actualizar(){
        $value = 'Su Cita ha sido creada Exitósamente, revise Historial';
        $this->dispatchBrowserEvent('name-updated', ['newName' => $value]);
    $this->render();
}

    public function updatingSearch()
    {
        $this->resetPage('medicines');
        $this->resetPage('interviews');
        $this->resetPage('files');
        $this->resetPage('appointments');
    }
    public function render()
    {

        $desde = today();
        $hasta = now()->addDays(15);
        $anterior = now()->subDays(90);
        $appointments = auth()->user()->appoinments()->whereBetween('date', [$desde, $hasta])->get();

        $files = File::whereHas('interviews', function ($q) {
            $q->where('user_id', '=', auth()->user()->id);
        })->paginate(2);

        $this->resetPage();
        $medicines = auth()->user()->medicines()->withPivot('dosage', 'instruction')->paginate(5);
        //dd($medicines,auth()->user()->id);

        $interviews = auth()->user()->interviews()->whereBetween('date', [$anterior, $hasta])->paginate(2);
        return view('livewire.patient.patient-info', ['data' => [
            'appointments' => $appointments, 'interviews' => $interviews,
            'files' => $files,
            'medicines' => $medicines,
        ]],  compact('appointments', 'interviews', 'medicines', 'files'));
    }
}
