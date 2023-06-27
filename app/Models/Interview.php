<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $guarded=[];
    use HasFactory;


    protected $dates = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
        'date'=>'datetime',
        'hour'=>'datetime',
        // your other new column
    ];

    public function user(){
        return $this->belongsTo(User::class,'patient_id');
    }

    public function getDoctorAttribute(){
        $doctor = User::find($this->doctor_id);
        return $doctor->name;
    }

    public function getPatientAttribute(){
        $doctor = User::find($this->patient_id);
        return $doctor->name;
    }

    public function files(){
        return $this->belongsToMany(File::class)->withPivot('user_id')->withTimestamps();
    }

    public function medicines()
{
    return $this->belongsToMany(Medicine::class, 'medicine_user')
                ->withPivot('user_id', 'instruction', 'dosage')
                ->withTimestamps();
}
}
