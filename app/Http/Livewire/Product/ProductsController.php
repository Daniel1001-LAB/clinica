<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Traits\CartTrait;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductsController extends Component
{
    use CartTrait;
    use WithPagination, WithFileUploads;

    public $name, $barcode, $cost, $price, $categoryid, $stock, $alerts,
        $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Productos';
        $this->categoryid = 'Elegir';
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:products|min:3',
            'cost' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'categoryid' => 'required|not_in:Elegir',
        ];

        $messages = [
            'name.required' => 'Nombre del producto requerido',
            'name.unique' => 'Ya existe el nombre del producto',
            'name.min' => 'Nombre del producto debe tener al menos 3 caracteres',
            'cost.required' => 'El costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            'alerts.required' => 'Ingresa el valor minimo de existencias',
            'categoryid.not_in' => 'Elige un nombre de categoria diferente de "Elegir"',
        ];

        $this->validate($rules, $messages);

        $product = Product::create([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->categoryid
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products/' . $customFileName);
            $product->image = $customFileName;
            $product->save();
        }

        $this->resetUI();
        $this->emit('product-added', 'Producto registradado');
    }

    public function Edit(Product $product)
    {
        $this->selected_id = $product->id;
        $this->name = $product->name;
        $this->barcode = $product->barcode;
        $this->cost = $product->cost;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->alerts = $product->alerts;
        $this->categoryid = $product->category_id;
        $this->image = null;

        $this->emit('show-modal', 'Show Modal');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'cost' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'categoryid' => 'required|not_in:Elegir',
        ];

        $messages = [
            'name.required' => 'Nombre del producto requerido',
            'name.unique' => 'Ya existe el nombre del producto',
            'name.min' => 'Nombre del producto debe tener al menos 3 caracteres',
            'cost.required' => 'El costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            'alerts.required' => 'Ingresa el valor minimo de existencias',
            'categoryid.not_in' => 'Elige un nombre de categoria diferente de "Elegir"',
        ];

        $this->validate($rules, $messages);

        $product = Product::find($this->selected_id);
        $product->update([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->categoryid
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products/' . $customFileName);
            $imageTemp = $product->image; // temporary
            $product->image = $customFileName;
            $product->save();

            if ($imageTemp != null) {
                if (file_exists('storage/products/' . $imageTemp)) {
                    unlink('storage/products/' . $imageTemp);
                }
            }
        }

        $this->resetUI();
        $this->emit('product-updated', 'Producto actualizado');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->barcode = '';
        $this->cost = '';
        $this->price = '';
        $this->stock = '';
        $this->alerts = '';
        $this->search = '';
        $this->categoryid = 'Elegir';
        $this->image = null;
        $this->selected_id = 0;
        $this->resetValidation();
    }

    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];

    public function Destroy(Product $product)
    {
        $imageTemp = $product->image;
        $product->delete();

        if ($imageTemp != null) {
            if (file_exists('storage/products/' . $imageTemp)) {
                unlink('storage/products/' . $imageTemp);
            }
        }

        $this->resetUI();
        $this->emit('product-deleted', 'Producto Eliminado');
    }

    public function ScanCode($code){
        $this->ScanearCode($code);
        $this->emit('global-msg', 'SE AGREGO EL PRODUCTO AL CARRITO');
    }


    public function render()
    {
        if (strlen($this->search) > 0) {
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->select('products.*', 'c.name as category')
                ->where('products.name', 'like', '%' . $this->search . '%')
                ->orWhere('products.barcode', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orderBy('products.name', 'asc')
                ->paginate($this->pagination);
        } else {
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->select('products.*', 'c.name as category')
                ->orderBy('products.name', 'asc')
                ->paginate($this->pagination);
        }


        return view('livewire.product.products-controller', [
            'products' => $products,
            'categories' => Category::orderBy('name', 'asc')->get(),

        ])->extends('inventory.app')->section('content');
    }
}
