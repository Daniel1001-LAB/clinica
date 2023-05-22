<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Disase;
use Livewire\Component;

class DisaseController extends Component
{
    public $name, $symptoms;
    public function render()
    {
        $disases = Disase::all();
        return view('livewire.doctor.disase-controller', ['disases' => $disases]);
    }
}
