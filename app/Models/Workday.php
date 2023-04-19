<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    const MONEDA = "$";

    use HasFactory;

    protected $guarded = [];


    public static function addWorkdays()
    {
        for ($i = 0; $i < 7; $i++) {
            Workday::create([
                'active' => false,
                'day' => $i,
                'morning_start' => 13,
                'morning_end' => 13,
                'afternoon_start' => 25,
                'afternoon_end' => 25,
                'evening_start' => 37,
                'evening_end' => 37,
                'morning_office' => 0,
                'afternoon_office' => 0,
                'evening_office' => 0,
                'morning_price' => 0,
                'afternoon_price' => 0,
                'evening_price' => 0,
                'doctor_id' => auth()->user()->id
            ]);
        }
    }

    public function getHourMSAttribute()
    {
        $hour12 = Hour::find($this->morning_start);
        return $hour12->str_hour_12;
    }

    public function getHourMEAttribute()
    {
        $hour12 = Hour::find($this->morning_end);
        return $hour12->str_hour_12;
    }

    public function getHourASAttribute()
    {
        $hour12 = Hour::find($this->afternoon_start);
        return $hour12->str_hour_12;
    }

    public function getHourAEAttribute()
    {
        $hour12 = Hour::find($this->afternoon_end);
        return $hour12->str_hour_12;
    }

    public function getHourESAttribute()
    {
        $hour12 = Hour::find($this->evening_start);
        return $hour12->str_hour_12;
    }

    public function getHourEEAttribute()
    {
        $hour12 = Hour::find($this->evening_end);
        return $hour12->str_hour_12;
    }

    public function getMOAttribute()
    {
        $office = Office::find($this->morning_office);
        if ($office) {
            $address = $office->local . ', ' . $office->address;
        } else {
            $address = "No tiene oficina registrada";
        }
        return $address;
    }

    public function getAOAttribute()
    {
        $office = Office::find($this->afternoon_office);
        if ($office) {
            $address = $office->local . ' , ' . $office->address;
        } else {
            $address = "No tiene oficina registrada";
        }
        return $address;
    }

    public function getEOAttribute()
    {
        $office = Office::find($this->evening_office);
        if ($office) {
            $address = $office->local . ', ' . $office->address;
        } else {
            $address = "No tiene oficina registrada";
        }
        return $address;
    }


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
