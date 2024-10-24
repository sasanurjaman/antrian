<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['role_id', 'name', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * relationship one to one user, role
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    /**
     * relationship one to one user, midwife
     */
    public function midwife()
    {
        return $this->hasOne(Midwife::class, 'user_id');
    }

    /**
     * relationship one to many user, schedule
     */
    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'user_id');
    }

    /**
     * relationship one to many user, doctor
     */
    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'user_id');
    }
}
