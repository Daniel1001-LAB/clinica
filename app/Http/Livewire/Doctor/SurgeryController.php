<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Surgery;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class SurgeryController extends Component
{
    use Actions;
    use WithPagination;
    public $name, $description;
    public $search;
    public $perPage = 3;
    public $surgeryId;
    public $sortAsc;
    public $modal = false;
    public $modalEdit = false;
    public $sortField = 'name';


    protected $rules = ['name' => 'required|unique:surgeries|max:20|min:5'];

    protected $messages = [
        'name.required' => 'Nombre de la enfermedad es requerido.',
        'name.unique' => 'Ya extiste una enfermedad con este nombre.',
        'name.max' => 'El nombre de la enfermedad debe tener máximo 20 caracteres',
        'name.min' => 'El nombre de la enfermedad debe tener al menos 5 caracteres',
    ];


    public function addSurgery()
    {
        $this->validate();
        $surgery = Surgery::create([
            'name' => mb_strtolower($this->name),
            'slug' => Str::slug($this->name),
            'description' => mb_strtolower($this->description),

        ]);

        $this->reset(['name', 'description']);
        $this->render();
        $this->modal = false;
    }

    public function edit(Surgery $surgery)
    {
        $this->surgeryId = $surgery->id;
        $this->name = $surgery->name;
        $this->description = $surgery->description;
        $this->modalEdit = true;
    }

    public function update(Surgery $surgery)
    {
        $this->validate();

        if ($surgery->users()->exists()) {
            $this->modalEdit = false;
            $this->notification()->error(

                $title = 'Error',
                $description = 'No se puede editar una cirugía asignada a pacientes.'
            );
            return;
        }

        $surgery->name = mb_strtolower($this->name);
        $surgery->slug = Str::slug($this->name);
        $surgery->description = mb_strtolower($this->description);
        $surgery->save();

        $this->reset(['name', 'description']);
        $this->modalEdit = false;

        $this->notification()->success(
            $title = 'Cirugía actualizada',
            $description = 'La cirugía se actualizó correctamente.'
        );
    }

    public function delete(Surgery $surgery)
    {
        if ($surgery->users()->exists()) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'No se puede eliminar una cirugía asignada a pacientes.'
            );
            return;
        } else {
            $this->dialog()->confirm([
                'title' => 'Confirmar eliminación',
                'description' => '¿Estás seguro de que deseas eliminar este tipo de cirugía?',
                'icon' => 'question',
                'accept' => [
                    'label' => 'Sí, eliminar',
                    'method' => 'performDelete',
                    'params' => $surgery->id,
                ],
                'reject' => [
                    'label' => 'No, cancelar',
                    'method' => 'cancelDelete',
                ],
            ]);
        }


    }

    public function performDelete($surgeryId)
    {
        $surgery = Surgery::findOrFail($surgeryId);
        $surgery->delete();
        $this->reset(['name', 'description']);

        $this->notification()->success(
            $title = 'Cirugía eliminada',
            $description = 'La cirugía se eliminó correctamente.'
        );
    }

    public function cancelDelete()
    {
        // Handle cancel action if needed
    }



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $surgeries = Surgery::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        return view('livewire.doctor.surgery-controller', ['surgeries' => $surgeries])->layout('layouts.doctor');
    }
}
