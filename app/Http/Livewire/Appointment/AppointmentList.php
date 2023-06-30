<?php

namespace App\Http\Livewire\Appointment;

use App\Events\AppoinmentStatusEvent;
use App\Models\Appoinment;
use App\Models\Interview;
use App\Models\User;
use App\Notifications\AppoinmentNotify;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class AppointmentList extends Component
{
    use Actions;
    use WithPagination;
    public $days = "-1";
    public $dateFrom, $dateTo;
    public $search;
    public $status = '';
    public $showToday = false;
    public $showNext5Days = false;
    public $showNext15Days = false;
    // public $appointment;
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function notifyAppoinment($appointmentId){
        $appoinment = Appoinment::find($appointmentId);
        $patient = $appoinment->patient;
        $patient->notify(new AppoinmentNotify($appoinment));


        $this->notification()->success(
            $title = 'Notificacion Enviada',
            $description = 'Se ha notificado correctamente al paciente.'
        );

    }

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

        $this->notification()->success(
            $title = 'Notificacion Enviada',
            $description = 'Se ha notificado correctamente al paciente.'
        );
    }

    public function canceled(Appoinment $appoinment)
    {
        // dd($appoinment);
        $appoinment->status = Appoinment::CANCELED;
        $appoinment->save();
        event(new AppoinmentStatusEvent($appoinment));

        $this->notification()->success(
            $title = 'Notificacion Enviada',
            $description = 'Se ha notificado correctamente al paciente de la cancelacion de la cita.'
        );
    }

    public function accomplished(Appoinment $appoinment)
    {
        // dd($appoinment);
        $appoinment->status = Appoinment::ACCOMPLISHED;
        $appoinment->save();
        // event(new AppoinmentStatusEvent($appoinment));
    }

    public function resetFilters()
    {
        $this->status = '';
        $this->showToday = false;
        $this->showNext5Days = false;
        $this->showNext15Days = false;
        $this->search = '';
    }

    public function showNext5Days()
    {
        // $this->resetFilters();
        $this->showNext5Days = true;
        $this->showNext15Days = false;
        $this->showToday = false;
        $this->resetPage();

    }

    public function showNext15Days()
    {
        // $this->resetFilters();
        $this->showNext15Days = true;
        $this->showNext5Days = false;
        $this->showToday = false;
        $this->resetPage();

    }

    public function showToday()
    {
        // $this->resetFilters();
        $this->showNext15Days = false;
        $this->showNext5Days = false;
        $this->showToday = true;
        $this->resetPage();

    }

    public function render()
    {
        // $this->resetFilters();
        $user = User::find(Auth::user()->id);
        $isDoctor = $user->hasRole('doctor');
        if ($isDoctor) {
            $find = 'doctor_id';
        } else {
            $find = 'patient_id';
        }

        $query = Appoinment::orderBy('date', 'desc')
            ->where($find, $user->id)
            ->where(function ($query) {
                $query->where('status', Appoinment::CONFIRMED)
                    ->orWhere('status', Appoinment::PENDING)
                    ->orWhere('status', Appoinment::CANCELED)
                    ->orWhere('status', Appoinment::ACCOMPLISHED)
                    ->orWhere('status', Appoinment::UNREALIZED);
            });



        if (!empty($this->status)) {
            $query->where('status', $this->status);
        }

        if ($this->showToday) {
            $query->whereDate('date', today());
        }

        if ($this->showNext5Days) {
            $query->whereBetween('date', [now(), now()->addDays(5)]);
        }

        if ($this->showNext15Days) {
            $query->whereBetween('date', [now(), now()->addDays(15)]);
        }

        $appoinments = $query->paginate();

        $search = '%' . $this->search . '%';
        $appoinmentsSearch = Appoinment::orderBy('date', 'desc')->where('status', 'like', $search)->paginate(1);

        $interviews = Interview::orderBy('date', 'asc')
            ->where($find, $user->id);

        return view('livewire.appointment.appointment-list', [
            'appoinments' => $appoinments, 'interviews' => $interviews, 'appoinmentsSearch' => $appoinmentsSearch
        ]);
    }
}
