<?php

namespace App\Http\Livewire\Patient;

use App\Models\Appoinment;
use App\Models\Hour;
use App\Models\User;
use App\Models\Workday;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PatientAppoinment extends Component
{
    public $user, $appoinments;
    public $inicio,$fin;

    public function mount(User $user){
        $this->user = $user;
    }

    public function generar(){
        $pre = $this->user->pregnants()->where('active',1)->first()->last_menstruation;
        $parto = $this->user->pregnants()->where('active',1)->first()->neaguele;
        $fecha = Carbon::parse($pre);
        $this->inicio = Carbon::parse($pre);
        $this->fin = Carbon::parse($parto);
        $d =[12,6,6,6,6];
        $j=0;
        $hora = Hour::find(18);
        for($i =0;$i<count($d);$i++){
            $j=$j+$d[$i];
             Appoinment::updateOrCreate([
                'patient_id'=>$this->user->id,
                'doctor_id' =>auth()->user()->id,
                'description'=>'CONTROL SEMANA N° '.$j],[
                'specialty_id'=>auth()->user()->specialties()->first()->id,
                'office_id'=>auth()->user()->offices()->first()->id,
                'date'=>$fecha->addWeeks($d[$i]),
                'hour'=>$hora->time_hour,
                'hour_id'=>18,
                'status'=>'PENDING',
                'price'=>Workday::where('doctor_id',auth()->user()->id)->first()->morning_price,
             ]);
        }
    }

    public function render()
    {
        $this->appoinments = DB::table('appoinments')->where('patient_id',$this->user->id)->orderBy('date')->get();
        return view('livewire.patient.patient-appoinment');
    }
}
