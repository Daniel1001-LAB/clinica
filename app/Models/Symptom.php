<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function users(){
        return $this->belongsToMany(User::class, 'patient_id')->withPivot('interview_id')->withTimestamps();
    }
}
