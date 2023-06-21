<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PregnantWoman extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'fum', 'no_lisem', 'proxima_cita', 'riesgo_reproductivo'];

    protected $dates = ['fum', 'proxima_cita'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', $search)
            ->orWhere('name', 'like', '%' . $search . '%');
    }
}
