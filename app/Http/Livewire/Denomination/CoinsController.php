<?php

namespace App\Http\Livewire\denomination;

use App\Models\Denomination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CoinsController extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $type, $value, $search, $image, $selected_id, $pageTitle, $componentName,  $customFileName;
    private $pagination = 5;


    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'DENOMINACIONES';
        $this->type = 'Elegir';
    }

    public function Edit($id)
    {
        $record = Denomination::find($id, ['id', 'type', 'value',  'image']);
        $this->type = $record->type;
        $this->value = $record->value;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('show-modal', 'show-modal!');
    }

    public function Store()
    {

        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => 'required|unique:denominations',

        ];

        $messages = [
            'type.required' => 'El tipo es requerido.',
            'type.not_in' => 'Elige un valor para el tipo distinto de "Elegir".',
            'value.required' => 'El valor es requerido.',
            'value.unique' => 'Ya existe el valor.',
        ];

        $this->validate($rules, $messages);

        $denomination = Denomination::create([
            'type' => $this->type,
            'value' => $this->value,
            // 'type' => $this->type,
        ]);


        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/denominations', $customFileName);
            $denomination->image = $customFileName;
            $denomination->save();
        }

        $this->resetUI();
        $this->emit('item-added', 'Denominacion Registrada');
    }

    public function Update()
    {
        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => "required|unique:denominations,value,{$this->selected_id}",

        ];

        $messages = [
            'type.required' => 'El tipo es requerido.',
            'type.not_in' => 'Elige un valor para el tipo distinto de "Elegir".',
            'value.required' => 'El valor es requerido.',
            'value.unique' => 'Ya existe el valor.',
        ];

        $this->validate($rules, $messages);

        $denomination = Denomination::find($this->selected_id);
        $denomination->update([
            'type' => $this->type,
            'value' => $this->value
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/denominations/', $customFileName);
            $imageName = $denomination->image;
            $denomination->image = $customFileName;
            $denomination->save();

            if ($imageName != null) {
                if (file_exists('storage/denominations/' . $imageName)) {
                    unlink('storage/denominations/' . $imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit('item-updated', 'Denominacion Actualizada');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Denomination $denomination)
    {
        // $denomination = denomination::find($id);
        // dd($denomination);
        $imageName = $denomination->image; //Imagen tempral antes de borrar
        $denomination->delete();

        if ($imageName != null) {
            unlink('storage/denominations/' . $imageName);
        }

        $this->resetUI();
        $this->emit('item-deleted', 'Denominacion Eliminada');
    }


    public function resetUI()
    {
        $this->value = '';
        $this->type = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $coins = Denomination::where('type', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $coins = Denomination::orderBy('id', 'desc')->paginate($this->pagination);
        }


        return view('livewire.denomination.coins-controller', ['coins' => $coins])->extends('inventory.app')->section('content');
    }
}
