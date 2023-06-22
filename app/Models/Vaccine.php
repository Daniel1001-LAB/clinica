<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'date',
        'pai'
    ];

    protected $dates = [
        'created_at'  => 'datetime',
        'updated_at' => 'datetime',
        'date' => 'datetime',
        // your other new column
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['date','vaccine_id'])->withTimestamps()->orderBy('date', 'desc');
    }
}
