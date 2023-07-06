<?php

namespace App\Http\Livewire\Patient;

use App\Models\File;
use App\Models\Interview;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PatientFile extends Component
{
    use WithFileUploads, WithPagination;

    public $openModal, $editModal, $file, $observation, $name, $interview, $fileId, $fileDoc, $extension, $url;
    public function mount(Interview $interview)
    {
        $this->interview = $interview;
        $this->file = null; // Reinicia el valor del archivo al cargar una nueva entrevista
    }
    protected $rules = [
        'file' => ['required', 'mimes:png,jpg,jpeg,pdf'],
        'name' => 'required',
        'observation' => 'required'
    ];

    public function add()
    {
        $this->validate();
        $file = new File();
        $file->user_id = $this->interview->user_id;
        $file->name = $this->name;
        $file->extension = $this->file->extension();
        $file->url = 'storage/' . $this->file->store('archivos', 'public');
        $file->observation = $this->observation;
        $file->save();
        $this->openModal = false;
        $this->interview->files()->attach($file->id, ['user_id' => $this->interview->user_id]);
        $intId = $this->interview->id;
        $this->interview = Interview::find($intId);
    }

    public function edit(File $file)
    {
        $this->fileId = $file->id;
        $this->name = $file->name;
        $this->extension = $file->extension;
        $this->url = $file->url;
        $this->observation = $file->observation;
        $this->editModal = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'observation' => 'required'
        ]);

        $file = File::findOrFail($this->fileId);
        $file->name = $this->name;
        $file->observation = $this->observation;

        if ($this->file) {
            // Se ha cargado un nuevo archivo, actualizamos la información del archivo
            $file->extension = $this->file->extension();
            $file->url = 'storage/' . $this->file->store('archivos', 'public');
        }

        $file->save();

        $this->reset(['name', 'observation', 'file']);
        $this->editModal = false;
        $this->render();
    }




    public function render()
    {
        $patient_files = $this->interview->files()->paginate(5);
        // $patient_medicines = $this->patient->medicines()->withPivot('dosage', 'instruction')->wherePivot('interview_id', $this->interview->id)->paginate(10);
        return view('livewire.patient.patient-file', compact('patient_files'));
    }
}
