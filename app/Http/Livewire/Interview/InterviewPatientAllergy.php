<?php

namespace App\Http\Livewire\Interview;

use App\Models\Pathology;
use App\Models\User;
use Livewire\Component;

class InterviewPatientAllergy extends Component
{
    public $search = "", $user_id, $modal = false, $modalEdit = false;
    public $name, $allergies,$user;

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->user_id = $user->id;
    }

    public function modify(Pathology $pathology)
    {
        $this->user->allergies()->attach($pathology->id, ['allergy' => '1']);
    }

    public function delete($pathologyId)
    {
       // $user = User::find($this->user_id);
        $this->user->allergies()->detach($pathologyId);

    }

    public function render()
    {
        //$user = User::find($this->user_id);
        $userAllergies = $this->user->allergies()->where('pathology_user.allergy', '=', '1')->get();
        $search = '%' . $this->search . '%';
        $this->allergies = Pathology::orderBy('name', 'desc')
            ->where('name', 'like', $search)
            ->take(5)->get();

        return view('livewire.interview.interview-patient-allergy', ['user' => $this->user, 'userAllergies' => $userAllergies]);
    }
}
