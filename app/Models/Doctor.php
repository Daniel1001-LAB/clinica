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

    public function workdays()
    {
        return $this->hasMany(Workday::class);
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Models\Specialty', 'specialty_user', 'user_id', 'specialty_id');
    }

    public function offices()
    {
        return $this->hasMany('App\Models\User', 'offices', 'doctor_id');
    }

}
