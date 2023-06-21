<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoriesController extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $name, $search, $image, $selected_id, $pageTitle, $componentName,  $customFileName;
    private $pagination = 5;


    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Categorias';
    }

    public function Edit($id)
    {
        $record = Category::find($id, ['id', 'name', 'image']);
        $this->name = $record->name;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('show-modal', 'show-modal!');
    }

    public function Store()
    {

        $rules = [
            'name' => 'required|unique:categories|min:3',
        ];

        $messages = [
            'name.required' => 'Nombre de la categoria es requerido.',
            'name.unique' => 'Ya extiste una categoria con este nombre.',
            'name.min' => 'El nombre de la categoria debe tener al menos 3 caracteres',
        ];

        $this->validate($rules, $messages);

        $category = Category::create([
            'name' => $this->name
        ]);


        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $category->image = $customFileName;
            $category->save();
        }

        $this->resetUI();
        $this->emit('category-added', 'Categoria Registrada');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:categories,name,{$this->selected_id}",
        ];

        $messages = [
            'name.required' => 'Nombre de categoria requerido',
            'name.min' => 'Nombre de categoria debe tener al menos 3 caracteres',
            'name.unique' => 'Nombre de categoria ya existe',
        ];

        $this->validate($rules, $messages);

        $category = Category::find($this->selected_id);
        $category->update([
            'name' => $this->name
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories/', $customFileName);
            $imageName = $category->image;
            $category->image = $customFileName;
            $category->save();

            if ($imageName != null) {
                if (file_exists('storage/categories/' . $imageName)) {
                    unlink('storage/categories/' . $imageName);
                }
            }
        }

        $this->resetUI();
        $this->emit('category-updated', 'Categoria Actualizada');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Category $category)
    {
        // $category = Category::find($id);
        // dd($category);
        $imageName = $category->image; //Imagen tempral antes de borrar
        $category->delete();

        if ($imageName != null) {
            unlink('storage/categories/' . $imageName);
        }

        $this->resetUI();
        $this->emit('category-deleted', 'Categoria Eliminada');
    }


    public function resetUI()
    {
        $this->name = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $data = Category::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $data = Category::orderBy('id', 'desc')->paginate($this->pagination);
        }


        return view('livewire.category.categories-controller', ['categories' => $data])->extends('inventory.app')->section('content');
    }
}
