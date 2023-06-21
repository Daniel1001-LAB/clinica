<?php

namespace App\Http\Livewire\Search;

use App\Traits\CartTrait;
use Livewire\Component;
use Illuminate\Support\Str;
class SearchController extends Component
{
    use CartTrait;
    public $search;
    public $currentPath;

    public function mount(){
        $this->currentPath = url()->current();
    }

    protected $listeners = ['scan-code' => 'ScanCode'];

    public function ScanCode($barcode){
        $routeName = Str::afterLast($this->currentPath, '/');

        if($routeName != 'pos'){
            $this->ScanearCode($barcode);
            redirect()->to('/pos');
        }
    }

    public function render()
    {
        return view('livewire.search.search-controller');
    }
}
