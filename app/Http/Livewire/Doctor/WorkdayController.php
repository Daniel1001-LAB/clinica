<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Hour;
use App\Models\Office;
use App\Models\Workday;
use Livewire\Component;

class WorkdayController extends Component
{
    public $officesEmpty = false;
    public $offices = [];
    public $morning = [];
    public $afternoon = [];
    public $evening = [];
    public $day, $ms, $me, $as, $ae, $es, $ee, $mo, $ao, $eo, $mp, $ap, $ep, $dia, $active = false, $morningActive = false,
    $eveningActive = false, $afternoonActive = false;
    public $workdayEditModal = false;
    protected $rules = [
        'day' => 'required',
        'ms' => 'required',
        'me' => 'required',
        'as' => 'required',
        'ae' => 'required',
        'es' => 'required',
        'ee' => 'required',
        'mo' => 'required',
        'ao' => 'required',
        'eo' => 'required',
        'mp' => 'required',
        'ap' => 'required',
        'ep' => 'required',
    ];

    public function officesEmptyClose()
    {
        $this->officesEmpty = false;
        return redirect()->route('doctor.index');
    }

    public function edit($day)
    {
        $morning = Hour::where('turn', 'morning')->get();
        $this->morning = $morning;
        $afternoon = Hour::where('turn', 'afternoon')->get();
        $this->afternoon = $afternoon;
        $evening = Hour::where('turn', 'evening')->get();
        $this->evening = $evening;
        //dd($morning);
        $this->day = $day;
        $workday = Workday::where('doctor_id', auth()->user()->id)->where('day', $day)->first();
        $this->ms = $workday->morning_start;
        $this->me = $workday->morning_end;
        $this->as = $workday->afternoon_start;
        $this->ae = $workday->afternoon_end;
        $this->es = $workday->evening_start;
        $this->ee = $workday->evening_end;
        $this->mo = $workday->morning_office;
        $this->ao = $workday->afternoon_office;
        $this->eo = $workday->evening_office;
        $this->mp = $workday->morning_price;
        $this->ap = $workday->afternoon_price;
        $this->ep = $workday->evening_price;
        $this->dia = DIA[$this->day];


        $this->workdayEditModal = true;
    }

    public function update($value)
    {

        $data = $this->validate($this->rules);
        $data['active'] = $this->active;
        $workday =  Workday::updateOrCreate([
            'day' => $this->day,
            'doctor_id' => auth()->user()->id,

        ], [
            'active' => $data['active'],
            'morning_start' => $this->ms,
            'morning_end' => $this->me,
            'afternoon_start' => $this->as,
            'afternoon_end' => $this->ae,
            'evening_start' => $this->es,
            'evening_end' => $this->ee,
            'morning_office' => $this->mo,
            'afternoon_office' => $this->ao,
            'evening_office' => $this->eo,
            'morning_price' => $this->mp,
            'afternoon_price' => $this->ap,
            'evening_price' => $this->ep,
            'morning_active' => $this->morningActive,
            'afternoon_active' => $this->afternoonActive,
            'evening_active' => $this->eveningActive,

        ]);
        $workday->save();
        $this->reset();
        $this->workdayEditModal = false;
    }

    public function render()
    {
        $offices = Office::where('doctor_id', auth()->user()->id)->get();
        if ($offices->isEmpty()) {
            $this->officesEmpty = true;
        }
        $this->offices = $offices;

        $workdays = Workday::where('doctor_id', auth()->user()->id)->get();
        if ($workdays->isEmpty()) {
            Workday::addWorkdays();
        }
        return view('livewire.doctor.workday-controller', ['offices' => $offices, 'workdays' => $workdays])->layout('layouts.doctor');
    }
}
