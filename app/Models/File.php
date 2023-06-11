<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'extension', 'url', 'observation'];

    public function interviews(){
        return $this->belongsToMany(Interview::class)->withPivot('user_id')->withTimestamps();
    }
}
