<?php

namespace App\Http\Livewire\Specialty;

use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class SpecialtyCreate extends Component
{
    use WithPagination;
    public $openModal = false;
    public $user_specialties_id;
    public $user_specialties;
    public $specialties;
    public $search ="";


    public function modify($s)
    {
        $old_ids =  $this->user_specialties_id = auth()->user()->specialties()
            ->pluck('specialty_id')->toArray();

        array_push($old_ids, $s);

        auth()->user()->specialties()->sync($old_ids);
        $this->user_specialties_id = auth()->user()->specialties()
            ->pluck('specialty_id')->toArray();
        $this->emitTo('specialty.specialty-list', 'reload');
    }

    public function del($s)
    {
        $old_ids = auth()->user()->specialties()
            ->pluck('specialty_id');

        $new = $old_ids->filter(function ($i) use ($s) {
            return $i !== $s;
        });

        auth()->user()->specialties()->sync($new);

        $this->user_specialties_id = auth()->user()->specialties()
            ->pluck('specialty_id')->toArray();

        $this->emitTo('specialty.specialty-list', 'reload');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';

        $this->user_specialties_id = auth()->user()->specialties()
        ->pluck('specialty_id')->toArray();

        $this->user_specialties = auth()->user()->specialties;


         $this->specialties = Specialty::whereNotIn('id',$this->user_specialties_id)->where('name','like',$search)
         ->take(5)->get();

        return view('livewire.specialty.specialty-create');
    }
}
