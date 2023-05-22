<?php

namespace App\Http\Livewire\Schedulle;

use App\Models\Workday;
use Carbon\Carbon;
use Livewire\Component;

class Schedulle extends Component
{
    public $day, $days;

    public function mount(){
        $this->day = (Carbon::now())->format('Y-m-d');
    }

    public function render()
    {
        $workdays = Workday::where('doctor_id', auth()->user()->id)->get();
        return view('livewire.schedulle.schedulle', ['workdays'=>$workdays]);
    }
}
