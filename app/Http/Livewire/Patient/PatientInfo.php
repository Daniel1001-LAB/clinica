<?php

namespace App\Http\Livewire\Patient;

use App\Models\Appoinment;
use App\Models\File;
use App\Models\Interview;
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
        $patient_id = auth()->user()->id;
        $appointments =Appoinment::where('patient_id', $patient_id)->whereBetween('date',[$desde,$hasta])->orderBy('date', 'desc')->orderBy('hour', 'asc')->limit(5)->get();
        $interviews =Interview::where('user_id',$patient_id)->whereBetween('date',[$anterior,$hasta])->orderBy('date', 'desc')->limit(3)->get();

        $files = File::where('user_id','=',auth()->user()->id)->paginate(2);

        $this->resetPage();
        $medicines = auth()->user()->medicines()->withPivot('dosage', 'instruction')->paginate(5);
        //dd($medicines,auth()->user()->id);

        $interviews = auth()->user()->interviews()->whereBetween('date', [$anterior, $hasta])->paginate(2);
        return view('livewire.patient.patient-info', compact('appointments', 'interviews', 'medicines', 'files'));
    }
}
