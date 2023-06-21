<?php

namespace App\Http\Livewire\Doctor;

use App\Models\PregnantWoman;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class LisemController extends Component
{
    use Actions;
    use WithPagination;
    public $name, $symptoms, $year, $disase_id, $preWoman, $woman, $disase;
    public $description;
    public $search;
    public $perPage = 3;
    public $surgeryId;
    public $sortAsc;
    public $modal = false;
    public $modalEdit = false;
    public $sortField = 'name';




    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pwomans = PregnantWoman::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        return view('livewire.doctor.lisem-controller', ['pwomans' => $pwomans])->layout('layouts.doctor');
    }
}
