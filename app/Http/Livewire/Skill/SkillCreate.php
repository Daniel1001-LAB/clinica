<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use App\Models\Specialty;
use Livewire\Component;

class SkillCreate extends Component
{

    public $openModal = false;
    public $specialties = [];
    public $title, $description, $specialty;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'specialty' => 'required',
    ];

    public function addSkill(){
        $data = $this->validate();
        Skill::create([
            'specialty' => $data['specialty'],
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => auth()->user()->id,

    ]);
    $this->openModal = false;
    $this->reset('title','description','specialty');
    $this->emitTo('skill.skill-list','render');

    }

    public function render()
    {
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        return view('livewire.skill.skill-create');
    }
}
