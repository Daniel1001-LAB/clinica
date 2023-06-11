<?php

namespace App\Http\Livewire\Patient;

use App\Models\Disase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class PatientDisase extends Component
{
    use Actions;
    public $name, $symptoms, $year, $disase_id, $patient_disases, $patient, $disase;
    public $search;
    public $perPage = 3;
    public $disaseId;
    public $sortAsc;
    public $modal = false;
    public $sortField = 'name';


    public function mount(User $user)
    {
        // dd($user->id);
        $this->patient = $user;
        $this->patient_disases = $user->disases;
    }

    protected $rules = ['name' => 'required', 'year' => 'required|numeric', 'disase_id' => 'required'];

    public function addModalDisase($disaseId)
    {
        $disase = Disase::find($disaseId);
        $this->name = $disase->name;
        $this->disase_id = $disase->id;
        $this->modal = true;
    }
    public function removeDisase($disaseId)
    {
        $this->dialog()->confirm([
            'title'       => 'Confirmar eliminación',
            'description' => '¿Estás seguro de que deseas eliminar esta enfermedad?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sí, eliminar',
                'method' => 'confirmRemoveDisase',
                'params' => $disaseId,
            ],
            'reject' => [
                'label'  => 'Cancelar',
                'method' => 'cancelRemoveDisase',
            ],
        ]);
    }

    public function confirmRemoveDisase($disaseId)
    {
        // Lógica para eliminar la enfermedad
        $this->patient->disases()->detach($disaseId);
        $this->patient_disases = $this->patient->disases()->get();
    }

    public function cancelRemoveDisase()
    {
        // Lógica para cancelar la eliminación de la enfermedad
    }


    // public function delete($disaseId)
    // {
    //     $this->patient->disases()->detach($disaseId);
    //     $this->patient_disases = $this->patient->disases()->get();
    // }

    public function addDisase()
    {
        $data = $this->validate();
        $this->patient->disases()->attach($data['disase_id'], ['year' => $data['year']]);
        $this->modal = false;
        $this->reset(['name', 'year', 'search']);
        $this->patient_disases = $this->patient->disases()->get();
        $this->resetValidation();
        $this->render();
    }

    public function addNew()
    {
        $newDisase = Disase::create([
            'name' => mb_strtolower($this->search),
            'slug' => Str::slug($this->search),
            'symptoms' => '',
        ]);
        $this->disase = $newDisase;
        $this->name = $newDisase->name;
        $this->addModalDisase($newDisase->id);
    }


    public function render()
    {
        if ($this->search) {
            $disases = Disase::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        } else {
            $disases = [];
        }

        return view('livewire.patient.patient-disase', ['disases' => $disases]);
    }
}
