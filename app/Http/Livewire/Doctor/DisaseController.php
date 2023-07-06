<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Disase;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class DisaseController extends Component
{
    use Actions;
    use WithPagination;
    public $name, $symptoms;
    public $search;
    public $perPage = 3;
    public $disaseId;
    public $sortAsc;
    public $modal = false;
    public $modalEdit = false;
    public $sortField = 'name';

    protected  $rules = [
        'name' => 'required|unique:disases|min:10',
    ];

    protected $messages = [
        'name.required' => 'Nombre de la enfermedad es requerido.',
        'name.unique' => 'Ya extiste una enfermedad con este nombre.',
        'name.min' => 'El nombre de la enfermedad debe tener al menos 10 caracteres',
    ];


    // protected $rules = ['name' => 'required|unique:disases|min:10'];

    public function addDisase()
    {

        $this->validate($this->rules, $this->messages);
        $disase = Disase::create([
            'name' => mb_strtolower($this->name),
            'slug' => Str::slug($this->name),
            'symptoms' => mb_strtolower($this->symptoms),

        ]);

        $this->reset(['name', 'symptoms']);
        $this->render();
        $this->modal = false;
    }

    public function edit(Disase $disase)
    {
        $this->disaseId = $disase->id;
        $this->name = $disase->name;
        $this->symptoms = $disase->symptoms;
        $this->modalEdit = true;
    }

    public function update(Disase $disase)
    {
        $this->validate();

        if ($disase->user()->exists()) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'No se puede editar una enfermedad que ya ha sido asignada a pacientes.'
            );
            return;
        }

        $disase->name = mb_strtolower($this->name);
        $disase->slug = Str::slug($this->name);
        $disase->symptoms = mb_strtolower($this->symptoms);
        $disase->save();

        $this->reset(['name', 'symptoms']);
        $this->modalEdit = false;

        $this->notification()->success(
            $title = 'Enfermedad actualizada',
            $description = 'La enfermedad se actualizó correctamente.'
        );
    }


    public function delete(Disase $disase)
    {
        if ($disase->user()->exists()) {
            $this->notification()->error(
                $title = 'Error',
                $description = 'No se puede eliminar una enfermedad asignada a pacientes.'
            );
            return;
        }

        // Proceder con la eliminación de la enfermedad
        $disase->delete();

        $this->notification()->success(
            $title = 'Enfermedad eliminada',
            $description = 'La enfermedad se eliminó correctamente.'
        );
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $disases = Disase::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        return view('livewire.doctor.disase-controller', ['disases' => $disases])->layout('layouts.doctor');
    }
}
