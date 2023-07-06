<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['id', 'name', 'symptom_id'])->withTimestamps()->orderBy('name');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', $search)
            ->orWhere('name', 'like', '%' . $search . '%');
    }

    public function interviews()
    {
        return $this->belongsToMany(Interview::class)->withPivot(['id', 'name', 'symptom_id', 'interview_id'])->withTimestamps()->orderBy('name');
    }
}
