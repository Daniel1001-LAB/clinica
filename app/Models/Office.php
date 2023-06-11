<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = ['local', 'address', 'phone', 'email', 'mobil', 'lat', 'lng', 'map', 'doctor_id'];

    public function user(){
        return $this->belongsTo(User::class,'doctor_id');
    }

    // public function appoinment(){
    //     return $this->belongsTo(Appoinment::class,'doctor_id');
    // }

}
