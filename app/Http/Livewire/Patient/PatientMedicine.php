<?php

namespace App\Http\Livewire\Patient;

use App\Models\User;
use Livewire\Component;
use App\Models\Medicine;
use App\Models\Interview;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;


class PatientMedicine extends Component
{
    use WithPagination;
    public $openModal = false;
    public $search;
    public $medicine_id, $dosage, $instruction;
    public $interview, $patient;
    // public $search;


    // public function searchMedicines(string $search): Collection
    // {
    //     $medicines = Medicine::query()
    //         ->where('name', 'like', '%' . $search . '%')
    //         ->orderBy('name')
    //         ->get();

    //     return $medicines;
    // }

    protected $rules = ['medicine_id' => 'required', 'dosage' => 'required', 'instruction' => 'required'];

    public function mount(Interview $interview)
    {
        $this->interview = $interview;
        $this->patient = User::find($interview->patient_id);
    }

    public function add()
    {
        $data = $this->validate();

        if ($this->medicine_id == 'new') {
            // Create a new medicine
            $medicine = Medicine::create([
                'name' => $this->search,
            ]);
        } else {
            // Use the selected medicine
            $medicine = Medicine::find($this->medicine_id);
        }

        // Attach the medicine to the patient
        $patient_id = $this->interview->patient_id;
        $medicine->users()->attach($patient_id, [
            'dosage' => $data['dosage'],
            'instruction' => $data['instruction'],
            'interview_id' => $this->interview->id
        ]);

        $this->openModal = false;
        $this->reset(['medicine_id', 'dosage', 'instruction']);
    }

    public function createNewMedicine()
    {
        $data = $this->validate([
            'search' => 'required',
        ]);

        $slug = Str::slug($data['search']);
        $exists = Medicine::where('slug', $slug)->exists();
        if (!$exists) {
            Medicine::create([
                'name' => mb_strtolower($data['search']),
                'slug' => $slug,
            ]);
        }

        $this->medicine_id = Medicine::where('slug', $slug)->value('id');
        $this->search = '';
    }
    public function delete($medicineId)
    {
        $this->patient->medicines()->detach($medicineId);
    }

    public function render()
    {
        $patient_medicines = $this->patient->medicines()->withPivot('dosage', 'instruction')->wherePivot('interview_id', $this->interview->id)->paginate(10);
        // $search = '%' . $this->search . '%';
        $medicines = Medicine::orderBy('name')
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.patient.patient-medicine', compact('medicines', 'patient_medicines'));
    }
}
