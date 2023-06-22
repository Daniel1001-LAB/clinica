<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pathology extends Model
{
    use HasFactory;

    protected $fillable =['code','name','slug','symptoms'];

    public static function search($search){
        return empty($search) ? static::query()
        : static::where('name','like','%'.$search.'%');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
