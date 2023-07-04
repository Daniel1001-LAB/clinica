<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Appoinment;
use App\Models\Office;
use Livewire\Component;
use WireUi\Traits\Actions;

class OfficeController extends Component
{
    use Actions;

    public $local, $address, $email, $phone, $mobil, $lat, $lgn, $map, $doctor_id, $office_id;
    public $officeAddModal = false;
    public $officeEditModal = false;
    public $officeDeleteModal = false;

    protected  $rules = [
        'local' => 'required|unique:offices|min:10|max:15',
        'address' => 'required',
        'email' => 'required|email',
        'phone' => 'required|min:15|numeric',
        'mobil' => 'required|min:15|numeric',

    ];

    protected $messages = [
        'local.required' => 'Nombre de la oficina/consultorio es requerido.',
        'local.unique' => 'Ya extiste una oficina/consultorio con este nombre.',
        'local.min' => 'El nombre de la oficina/consultorio debe tener al menos 10 caracteres',
        'local.min' => 'El nombre de la oficina/consultorio debe tener 15 caracteres maximo',
        'email.required' => 'El correo es requerido',
        'phone.required' => 'El numero de telefono del consultorio es requerido, si no posee telefono privado, use su numero de contacto personal.',
        'mobile.required' => 'El numero de telefono mobil del doctor es requerido',
    ];


    public function openAddModal()
    {
        $this->resetErrorBag(); // Restablecer los mensajes de error
        $this->officeAddModal = true;
    }

    public function openEditModal(Office $office)
    {
        //dd($office);
        $this->resetErrorBag(); // Restablecer los mensajes de error
        $this->local = $office->local;
        $this->address = $office->address;
        $this->email = $office->email;
        $this->phone = $office->phone;
        $this->mobil = $office->mobil;
        $this->lat = $office->lat;
        $this->lgn = $office->lgn;
        $this->map = $office->map;
        $this->office_id = $office->id;
        $this->officeEditModal = true;
    }

    public function editOffice(Office $office)
    {
        $this->resetErrorBag(); // Restablecer los mensajes de error
        $office->local =  $this->local;
        $office->address =  $this->address;
        $office->email =  $this->email;
        $office->phone = $this->phone;
        $office->mobil = $this->mobil;
        $office->map = $this->map;
        $office->lat = $this->lat;
        $office->lgn = $this->lgn;
        $office->save();
        $this->officeEditModal = false;
    }


    public function addOffice()
    {
        $this->resetErrorBag(); // Restablecer los mensajes de error
        $data =  $this->validate($this->rules, $this->messages);
        $this->doctor_id = auth()->user()->id;
        $office = Office::create([
            'local' => $data['local'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'mobil' => $data['mobil'],
            'lat' => $this->lat,
            'lgn' => $this->lgn,
            'map' => $this->map,
            'doctor_id' => $this->doctor_id,
        ]);

        $errors = $this->getErrorBag()->getMessages();
        $this->officeAddModal = empty($errors);
        if (empty($errors)) {
            $this->reset();
            // session()->flash('success', 'Registro creado correctamente');
        }
    }

    public function openDeleteModal(Office $office)
    {
        $this->local = $office->local;
        $this->address = $office->address;
        $this->office_id = $office->id;

        $this->officeDeleteModal = true;
    }

    public function deleteOffice()
    {
        $office = Office::find($this->office_id);

        // Verificar si existen citas asociadas a la oficina
        if (Appoinment::where('office_id', $office->id)->exists()) {
            $this->officeDeleteModal = false;
            $this->notification()->error(
                $title = 'Error !!!',
                $description = 'No puedes eliminar una oficina o consultorio si posee citas pendientes, por favor, termine sus entrevistas pendientes para poder hacer esto.'
            );
            return;
        }

        $office->delete();
        $this->officeDeleteModal = false;
    }



    public function render()
    {
        $offices = Office::where('doctor_id', auth()->user()->id)->get();
        return view('livewire.doctor.office-controller', [
            'offices' => $offices
        ])->layout('layouts.doctor');
    }
}
