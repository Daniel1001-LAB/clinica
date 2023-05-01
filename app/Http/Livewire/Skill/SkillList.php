<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use App\Models\Specialty;
use Livewire\Component;

class SkillList extends Component
{


    public $skills;
    public $specialties = [];
    public $openModal = false;
    public $title, $description, $specialty, $skill_id;
    protected $listeners = ['delete'=>'delete', 'render'];


    public function delete($skillId){
        $skill = Skill::find($skillId);
        $skill->delete();
    }

    public function update()
    {
        $skill = Skill::find($this->skill_id);
        $skill->title = $this->title;
        $skill->specialty = $this->specialty;
        $skill->description = $this->description;
        // $skill->user_id = $this->user_id;
        $skill->save();
        $this->openModal = false;
        session()->flash('success', 'Specialty successfully updated.');
    }

    public function edit(Skill $skill)
    {
        //dd($skill);
        $this->title = $skill->title;
        $this->description = $skill->description;
        $this->specialty = $skill->specialty;
        $this->skill_id = $skill->id;
        $this->openModal = true;
    }


    public function render()
    {
        $this->skills = auth()->user()->skills;
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        return view('livewire.skill.skill-list');
    }
}
