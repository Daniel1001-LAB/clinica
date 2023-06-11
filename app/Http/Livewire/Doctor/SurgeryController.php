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



    protected $rules = ['name' => 'required|unique:surgeries'];

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

    public function update(surgery $surgery)
    {
        $this->validate();
        $surgery->name = mb_strtolower($this->name);
        $surgery->slug = Str::slug($this->name);
        $surgery->description = mb_strtolower($this->description);
        $surgery->save();
        $this->reset(['name', 'description']);
        $this->modalEdit = false;
        $this->render();
    }

    public function delete(Surgery $surgery)
    {
        $this->dialog()->confirm([
            'title' => 'Confirmar eliminación',
            'description' => '¿Estás seguro de que deseas eliminar este tipo de cirujia?',
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

    public function performDelete($surgeryId)
    {
        $surgery = Surgery::findOrFail($surgeryId);
        $surgery->delete();
        $this->reset(['name', 'description']);
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
