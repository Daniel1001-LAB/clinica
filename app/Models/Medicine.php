<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    public $fillable = ['name', 'slug'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('interview_id', 'instruction', 'dosage');
    }
}
