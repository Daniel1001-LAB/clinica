<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable =['time_hour','str_hour_12', 'str_hour_24','int_hour', 'turn', 'interval' ];
}
