<?php

namespace App\Http\Livewire\Appointment;

use App\Events\AppoinmentStatusEvent;
use App\Models\Appoinment;
use App\Models\Interview;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentList extends Component
{
    use WithPagination;
    public $days = "-1";
    public $dateFrom, $dateTo;

    public function mount()
    {
        $this->dateFrom = now()->addDays($this->days);
        $this->dateTo = now();
    }

    public function updatedDays($value)
    {
        $this->days = $value;
        if ($this->days == 0) {
            $this->dateTo = now()->addDays(0);
        } else {
            $this->dateTo = now()->addDays($this->days);
        }
    }

    public function confirmed(Appoinment $appoinment)
    {
        // dd($appoinment);
        $appoinment->status = Appoinment::CONFIRMED;
        $appoinment->save();
        event(new AppoinmentStatusEvent($appoinment));
    }

    public function canceled(Appoinment $appoinment)
    {
        // dd($appoinment);
        $appoinment->status = Appoinment::CANCELED;
        $appoinment->save();
        event(new AppoinmentStatusEvent($appoinment));
    }

    public function accomplished(Appoinment $appoinment)
    {
        // dd($appoinment);
        $appoinment->status = Appoinment::ACCOMPLISHED;
        $appoinment->save();
        event(new AppoinmentStatusEvent($appoinment));
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $isDoctor = $user->hasRole('doctor');
        if ($isDoctor) {
            $find = 'doctor_id';
        } else {
            $find = 'patient_id';
        }

        $appoinments = Appoinment::orderBy('date', 'desc')
            ->whereBetween('date', [$this->dateFrom, $this->dateTo])
            ->where($find, $user->id)
            ->where(function ($query) {
                $query->where('status', Appoinment::CONFIRMED)
                    ->orWhere('status', Appoinment::PENDING)
                    ->orWhere('status', Appoinment::CANCELED)
                    ->orWhere('status', Appoinment::ACCOMPLISHED)
                    ->orWhere('status', Appoinment::UNREALIZED);
            })
            ->paginate(1);

        $interviews = Interview::orderBy('date', 'asc')
            ->where($find, $user->id);

        return view('livewire.appointment.appointment-list', [
            'appoinments' => $appoinments, 'interviews' => $interviews
        ]);
    }
}
