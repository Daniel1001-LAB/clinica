<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disase extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'symptoms'];


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', $search)
            ->orWhere('name', 'like', '%' . $search . '%');
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('year');
    }
}
