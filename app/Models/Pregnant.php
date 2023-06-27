<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregnant extends Model
{
    use HasFactory;
    const GESTANDO     = 'GESTANDO';
    const INTERRUPIDO  = 'INTERRUPIDO';
    const FINALIZADO     = 'FINALIZADO';

    const CYCLE = 21;
    const FLOW  =2;

    protected $guarded=[];

    protected $dates = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_menstruation' => 'datetime',
        'pinar' => 'datetime',
        'wahl' => 'datetime',
        'naeguele' => 'datetime'        // your other new column
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function embarazada(){
        return ($this->active == 1) and ($this->status != Pregnant::FINALIZADO);

    }

    public function pinar(){

        return $this->last_menstruation->addDays(10+$this->flow)->subMonths(3);
    }

    public function whal(){

        return $this->last_menstruation->addDays(10-$this->flow)->subMonths(3);
    }

    public function naeguele(){

        return $this->last_menstruation->addDays(7-($this->flow-1))->subMonths(3);
    }
}
