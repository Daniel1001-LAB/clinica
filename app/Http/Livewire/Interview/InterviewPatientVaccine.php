<?php

namespace App\Http\Livewire\Interview;

use App\Models\Interview;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class InterviewPatientVaccine extends Component
{

    public $search, $user_id, $modal = false, $modalVaccine = false, $pai=false;
    public $name, $vaccines, $date, $user, $userVaccines;

    protected $rules = ['name' => 'required|unique:vaccines,name'];

    public function mount(User $user)
    {
        $this->user = $user;
        //dd($user);
        $this->user_id = $user->id;
        $this->date = Carbon::parse(now())->format('Y-m-d');
    }

    public function bdc($valor)
    {
        $nuevo =  \Carbon\Carbon::parse($this->date);
        DB::table('user_vaccine')
        ->where('user_id', $valor['pivot']['user_id'])
        ->where('vaccine_id', $valor['pivot']['vaccine_id'])
        ->update(['date' => $nuevo]);
    }

    public function saveVaccine()
    {
        $this->validate();
        Vaccine::create([
            'name' => mb_strtolower($this->name),
            'slug' => Str::slug($this->name),
            'pai'=>$this->pai
        ]);
        $this->name = '';
        $this->modalVaccine = false;
    }
    public function modify(Vaccine $vaccine)
    {
        if($this->user->vaccines()->where('vaccine_id',$vaccine->id)->exists()){
            return redirect()->back()->with('message','Vacuna repetida..');
        };
        $this->user->vaccines()->attach($vaccine->id, ['date' => $this->date]);
    }

    public function delete($vaccineId)
    {
        $this->user->vaccines()->detach($vaccineId);
        $this->userVaccines = $this->user->vaccines;

    }

    public function render()
    {
        $user = User::find($this->user_id);
        //dd($user);
        //$this->user_vaccines_id =
        $this->userVaccines = $user->vaccines;
        $search = '%' . $this->search . '%';
        $this->vaccines = Vaccine::orderBy('name', 'desc')
            ->where('name', 'like', $search)->whereNotIn('id',[])
            ->take(5)->get();

        return view('livewire.interview.interview-patient-vaccine');
    }
}
