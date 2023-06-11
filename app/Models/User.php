<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'external_id',
        'external_auth',
    ];

    protected $table = "users";

    public function routeNotificationForWhatsApp()
    {
        return $this->phone;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $dates = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'birthdate' => 'datetime',

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function socials()
    {
        return $this->belongsToMany(Social::class)->withPivot('url');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function offices()
    {
        return $this->hasMany(Office::class, 'doctor_id');
    }

    public function appoinments()
    {
        return $this->hasMany(Appoinment::class, 'patient_id');
    }

    public function disases()
    {
        return $this->belongsToMany(Disase::class)->withPivot('year');
    }

    public function surgeries()
    {
        return $this->belongsToMany(Surgery::class)->withPivot('year');
    }

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'symptom_user','patient_id')->withPivot('interview_id');
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)->withPivot('interview_id', 'instruction', 'dosage')->withTimestamps();
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class, 'patient_id');
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
