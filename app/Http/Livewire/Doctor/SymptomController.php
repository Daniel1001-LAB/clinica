<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Symptom;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class SymptomController extends Component
{
    use Actions;
    use WithPagination;
    public $search = '';
    public $perPage = 5;
    public $sortAsc = true;
    public $sortField = 'name';
    public $symptomId;

    public $name;

    public $modal = false;
    public $modalEdit = false;

    protected $rules = ['name' => 'required|unique:symptoms|min:5'];
    protected $messages = [
        'name.required' => 'Nombre del síntoma es requerido.',
        'name.unique' => 'Ya extiste un síntoma con este nombre.',
        'name.min' => 'El nombre del síntoma debe tener al menos 5 caracteres',
    ];


    public function addSymptom()
    {
        $this->validate();

        // Crear el síntoma
        $symptom = Symptom::create([
            'name' => mb_strtolower($this->name),
            'slug' => Str::slug($this->name),
        ]);

        // Resetear el campo 'name'
        $this->reset('name');
         // Limpiar los errores de validación
         $this->resetValidation();
        // Cerrar el modal y actualizar la vista
        $this->modal = false;
        $this->render();

        // Mostrar la notificación de éxito
        $this->dialog()->success(
            $title = 'Síntoma Creado',
            $description = 'Ha creado un nuevo síntoma.'
        );
    }

    public function edit(Symptom $symptom)
    {
        $this->symptomId = $symptom->id;
        $this->name = $symptom->name;
        $this->modalEdit = true;
    }

    public function update(Symptom $symptom)
    {
        $this->validate();

        // Verificar si el síntoma tiene pacientes asignados
        if ($symptom->users->count() == 0) {
            // Actualizar el síntoma
            $symptom->name = mb_strtolower($this->name);
            $symptom->slug = Str::slug($this->name);
            $symptom->save();

            // Resetear el campo 'name'
            $this->reset('name');

            // Cerrar el modal
            $this->modalEdit = false;

            // Mostrar la notificación de éxito
            $this->dialog()->success(
                $title = 'Síntoma Actualizado',
                $description = 'síntoma actualizado correctamente.'
            );
        } else {
            // Resetear el campo 'name'
            $this->reset('name');
             // Limpiar los errores de validación
            $this->resetValidation();
            // Cerrar el modal y actualizar la vista
            $this->modalEdit = false;
            $this->render();

            // Mostrar la advertencia
            $this->dialog()->info(
                $title = 'Advertencia',
                $description = 'Éste síntoma ya está asignado a algunos pacientes y por ende no se puede editar ni borrar. Si desea registrar un nuevo síntoma, agréguelo y adjunte el síntoma actual.'
            );
        }
    }

    // ...

    public function delete(Symptom $symptom)
    {
        if ($symptom->users->count() == 0) {
            // Mostrar el diálogo de confirmación
            $this->dialog()->confirm([
                'title'       => 'Está seguro?',
                'description' => 'Deseas eliminar este síntoma?',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Sí, bórralo',
                    'method' => 'confirmDelete',
                    'params' => $symptom->id,
                ],
                'reject' => [
                    'label'  => 'No, cancelar',
                    'method' => 'cancel',
                ],

            ]);
        } else {
            // Resetear el campo 'name'
            $this->reset('name');
             // Limpiar los errores de validación
            $this->resetValidation();
            // Cerrar el modal y actualizar la vista
            $this->modalEdit = false;
            $this->render();

            // Mostrar la advertencia
            $this->dialog()->info(
                $title = 'Advertencia',
                $description = 'Éste síntoma ya está asignado a algunos pacientes y por ende no se puede editar ni borrar. Si desea registrar un nuevo síntoma, agréguelo y adjunte el síntoma actual.'
            );
        }
    }

    public function confirmDelete($symptomId)
    {
        $symptom = Symptom::findOrFail($symptomId);
        $symptom->delete();
        $this->dialog()->info(
            $title = 'Success',
            $description = 'Se ha eliminado correctamente.'
        );
    }

    public function render()
    {

        $symptoms = Symptom::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        return view('livewire.doctor.symptom-controller', ['symptoms' => $symptoms])->layout('layouts.doctor');
    }
}
