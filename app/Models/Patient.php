<?php

namespace App\Models;

use App\Models\Scopes\PatientScope;

class Patient extends User
{
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new PatientScope);
    }

    public function appoinments(){
        return $this->hasMany(Appoinment::class);
    }


}
