<?php

namespace App\Http\Livewire\Patient;

use App\Models\Appoinment;
use App\Models\Hour;
use App\Models\Office;
use App\Models\Workday;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class PatientDate extends Component
{
    use Actions;
    public $openModal = false;
    public $selectedOfficeAddress;
    public $selectedOffice;
    public $officeAddress, $officePrice;
    public $price;
    public $date, $day, $doctor_id, $specialty_id, $intervals = [];
    public $appointments, $interval, $workday, $morning = [], $afternoon = [], $evening = [];
    public $office;
    protected $listeners = ['selectDate' => 'selectDate', 'addAppointment' => 'addAppointment'];

    public function selectDate($doctorID, $specialtyID)
    {
        //dd($doctorID, $specialtyID);
        $this->reset('date');
        $this->morning = [];
        $this->evening = [];
        $this->afternoon = [];

        $this->doctor_id = $doctorID;
        $this->specialty_id = $specialtyID;
        $this->openModal = true;
    }

    public function updatedDate($value)
    {
        $this->morning = [];
        $this->afternoon = [];
        $this->evening = [];

        $newDate = new Carbon($value);
        $hoy = Carbon::now();
        if ($hoy->gt($newDate)) {
            session()->flash('message', 'La fecha seleccionada no es válida.');
            return redirect()->back();
        }
        $this->day = $newDate->dayOfWeek;
        $work = Workday::where('doctor_id', $this->doctor_id)
            ->where('day', $this->day)->first();

        if (
            ($work->morning_start == $work->morning_end) and
            ($work->afternoon_start == $work->afternoon_end) and
            ($work->evening_start == $work->evening_end)
        ) {
            session()->flash('message', 'No hay horario para el día selecionado.');
            return redirect()->back();
        };

        $int1 = $this->getIntervalo($work->morning_start, $work->morning_end);
        $int2 = $this->getIntervalo($work->afternoon_start, $work->afternoon_end);
        $int3 = $this->getIntervalo($work->evening_start, $work->evening_end);

        $this->morning = $int1;
        $this->afternoon = $int2;
        $this->evening = $int3;
    }

    public function getIntervalo($start, $end)
    {
        $appointments = Appoinment::where('date', $this->date)
            ->where('doctor_id', $this->doctor_id)->pluck('hour_id')->toArray();
        $array = [];

        if ($start < $end) {
            for ($i = $start; $i <= $end; $i++) {
                $var = Hour::find($i);
                if (!in_array($var->id, $appointments)) {
                    array_push($array, $var->interval);
                }
            }
        } else {
            $array = [];
        }
        return $array;
    }

    public function seleccionar($m)
    {

        try {
            $hour = Hour::where('interval', $m)->first();
            $workday = Workday::where('doctor_id', $this->doctor_id)
                ->where('day', $this->day)
                ->first();

            // $office_id = null;
            // $price = null;

            switch ($hour->turn) {
                case 'dawn':
                    $office_id = $workday->evening_office;
                    $price = $workday->evening_price;
                    break;
                case 'morning':
                    $office_id = $workday->morning_office;
                    $price = $workday->morning_price;
                    break;
                case 'afternoon':
                    $office_id = $workday->afternoon_office;
                    $price = $workday->afternoon_price;
                    break;
                case 'evening':
                    $office_id = $workday->evening_office;
                    $price = $workday->evening_price;
                    break;
            }

            // $office = Office::find($workday->office_id);
            // $this->selectedOffice = $office;
            // $this->officePrice = $price;

            $this->dispatchBrowserEvent('store-data', [
                'interval' => $hour->interval,
                'doctor_id' => $this->doctor_id,
                'specialty_id' => $this->specialty_id,
                'day' => $this->day,
                'date' => $this->date,
                'office_id' => $office_id,
                'price' => $price,
            ]);

            if (auth()->user()) {
                $this->dispatchBrowserEvent('delete-data');
                // Creacion de la cita
                Appoinment::create([
                    'patient_id' => auth()->user()->id,
                    'doctor_id' => $this->doctor_id,
                    'specialty_id' => $this->specialty_id,
                    'date' => $this->date,
                    'hour' => $hour->time_hour,
                    'hour_id' => $hour->id,
                    'office_id' => $office_id,
                    'price' => $price,
                ]);
                $this->openModal = false;
            } else {
                // Guardaremos la cita
                $this->openModal = false;
                // Loguearemos al usuario si no lo está
                return redirect()->route('login');
                // Crearemos la cita
            }


            $this->dialog()->success(
                $title = 'Cita creada Correctamente',
                $description = 'Se ha notificado al doctor de tu cita programada, el doctor se pondra en contacto contigo por correo electronico o por tu numero de telefono.'
            );
        } catch (\Exception $e) {
            $this->dialog()->error(
                $title = 'Error al crear la cita',
                $description = $e->getMessage()
            );
        }
    }


    public function addAppointment(
        $interval,
        $doctor_id,
        $specialty_id,
        $day,
        $date,
        $office_id,
        $price
    ) {
        $hour = Hour::where('interval', $interval)->first();
        $workday = Workday::find($hour->id);
        if (auth()->user()) {
            Appoinment::create([
                'patient_id' => auth()->user()->id,
                'doctor_id' => $doctor_id,
                'specialty_id' => $specialty_id,
                'date' => $date,
                'hour' => $hour->time_hour,
                'hour_id' => $hour->id,
                'office_id' => $office_id,
                'price' => $price,
            ]);
            $this->emitTo('patient.patient-info','actualizar');
        }
        $this->dispatchBrowserEvent('delete-data');
        // $this->openModal = false;
    }

    public function render()
    {

        return view('livewire.patient.patient-date', );
    }
}
