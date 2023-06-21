<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appoinment extends Model
{
    use HasFactory;
    use Notifiable;

    const PENDING   = 'PENDING';
    const CONFIRMED   = 'CONFIRMED';
    const ACCOMPLISHED   = 'ACCOMPLISHED';
    const UNREALIZED   = 'UNREALIZED';
    const CANCELED   = 'CANCELED';


    protected $guarded = [];
    protected $dates = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date' => 'datetime',
        'hour' => 'datetime',
        // your other new column
    ];

    public function getPatientAttribute()
    {
        $patient = User::find($this->patient_id);
        return $patient;
    }

    public function getDoctorAttribute()
    {
        $doctor = User::find($this->doctor_id);
        return $doctor;
    }

    public function getSpecialtyAttribute()
    {
        $specialty = Specialty::find($this->specialty_id);
        return $specialty;
    }

    public function getOfficeAttribute()
    {
        $office = Office::find($this->office_id);
        return $office;
    }

    public function getOficinaAttribute()
    {
        $oficina = Office::find($this->office_id);
        return $oficina;
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
