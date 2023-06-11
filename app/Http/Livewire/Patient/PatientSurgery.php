<?php

namespace App\Http\Livewire\Patient;

use App\Models\Surgery;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
class PatientSurgery extends Component
{
    use Actions;
    public $name, $description, $year, $surgery_id, $patient_surgeries, $patient, $surgery;
    public $search;
    public $perPage = 3;
    public $surgeryId;
    public $sortAsc;
    public $modal = false;
    public $sortField = 'name';

    public function mount(User $user)
    {
        // dd($user->id);
        $this->patient = $user;
        $this->patient_surgeries = $user->surgeries;
    }

    protected $rules = ['name' => 'required', 'year' => 'required|numeric', 'surgery_id' => 'required'];

    public function addModalSurgery($surgeryId)
    {
        $surgery = Surgery::find($surgeryId);
        $this->name = $surgery->name;
        $this->surgery_id = $surgery->id;
        $this->modal = true;
    }
    public function removeSurgery($surgeryId)
    {
        $this->dialog()->confirm([
            'title'       => 'Confirmar eliminación',
            'description' => '¿Estás seguro de que deseas eliminar la cirujia del paciente?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sí, eliminar',
                'method' => 'confirmRemoveSurgery',
                'params' => $surgeryId,
            ],
            'reject' => [
                'label'  => 'No, Cancelar',
                'method' => 'cancelRemoveSurgery',
            ],
        ]);
    }

    public function confirmRemoveSurgery($surgeryId)
    {
        // Lógica para eliminar la enfermedad
        $this->patient->surgeries()->detach($surgeryId);
        $this->patient_surgeries = $this->patient->surgeries()->get();
    }

    public function cancelRemoveSurgery()
    {
        // Lógica para cancelar la eliminación de la enfermedad
    }


    // public function delete($surgeryId)
    // {
    //     $this->patient->surgeries()->detach($surgeryId);
    //     $this->patient_surgeries = $this->patient->surgeries()->get();
    // }

    public function addSurgery()
    {
        $data = $this->validate();
        $this->patient->surgeries()->attach($data['surgery_id'], ['year' => $data['year']]);
        $this->modal = false;
        $this->reset(['name', 'year', 'search']);
        $this->patient_surgeries = $this->patient->surgeries()->get();
        $this->resetValidation();
        $this->render();
    }

    public function addNew()
    {
        $newSurgery = surgery::create([
            'name' => mb_strtolower($this->search),
            'slug' => Str::slug($this->search),
            'description' => '',
        ]);
        $this->surgery = $newSurgery;
        $this->name = $newSurgery->name;
        $this->addModalSurgery($newSurgery->id);
    }

    public function render()
    {
        if ($this->search) {
            $surgeries = Surgery::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        } else {
            $surgeries = [];
        }
        return view('livewire.patient.patient-surgery', ['surgeries' => $surgeries]);
    }
}
