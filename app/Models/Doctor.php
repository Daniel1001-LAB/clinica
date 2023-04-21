<?php

namespace App\Models;

use App\Models\Scopes\DoctorScope;

class Doctor extends User
{
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new DoctorScope);


    }

    public function workdays(){
        return $this->hasMany(Workdays::class);
    }



}
