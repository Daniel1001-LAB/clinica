<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable =['title','specialty', 'description','user_id'];

    public function doctors(){
        return $this->belongsTo(User::class);
    }
}



