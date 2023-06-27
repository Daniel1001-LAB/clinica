<?php

namespace App\Http\Livewire\Patient;

use App\Models\Pregnant;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;

class PatientGesta extends Component
{
    public $modal = false;
    public $user, $name;
    public $last;
    public $cycle = Pregnant::CYCLE,$flow=Pregnant::FLOW;
    public $fecha = '';
    public $pinar,$wahl,$naeguele,$f1,$f2,$f3;

    protected $rules = [
        'last' => 'required',
        'cycle' => 'required|numeric',
        'flow' => 'required|numeric',
        ];

    public function mount(User $user){
     $this->user = $user;
     $this->name = $user->name;
    }

    public function updatedLast()
{
    $this->parto();
}

public function updatedFlow()
{
    $this->parto();
}




public function addGesta(){
    $data = $this->validate();
    $pregnant = Pregnant::create([
        'user_id'=>$this->user->id,
         'last_menstruation'=>$this->last,
         'flow'=>$this->flow,
         'cycle'=>$this->cycle,
          'pinar'=>$this->f1,
          'wahl'=>$this->f2,
          'naeguele'=>$this->f3
    ]);
    $MyId =$this->user->id;
    $this->reset();
    $this->modal = false;
    return redirect()->to('/doctor/interviews/'.$MyId);

}

public function parto(){
    Carbon::setLocale('es');
    $this->pinar =  Carbon::parse($this->last)->addDays(10+$this->flow)->subMonths(3);
    $this->f1 =$this->pinar;
    $this->pinar =$this->pinar->locale('es-ES')->isoFormat('dddd D MMMM \\d\\e YYYY');
    $this->wahl  =  Carbon::parse($this->last)->addDays(10-$this->flow)->subMonths(3);
    $this->f2 = $this->wahl;
    $this->wahl = $this->wahl->locale('es-ES')->isoFormat('dddd D MMMM \\d\\e YYYY');
    $this->naeguele = Carbon::parse($this->last)->addDays(7-($this->flow-1))->subMonths(3);
    $this->f3 = $this->naeguele;
    $this->naeguele = $this->naeguele->locale('es-ES')->isoFormat('dddd D MMMM \\d\\e YYYY');

}

    public function render()
    {
        return view('livewire.patient.patient-gesta');
    }
}
