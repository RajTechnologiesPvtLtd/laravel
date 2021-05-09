<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//custum
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use RajTechnologies\FCM\Models\FCM;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;
    use HasApiTokens;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'device_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //laravel relationship
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function fcm()
    {
        return $this->hasMany(FCM::class);
    }
    //custom
    public function routeNotificationForFcm($notification)
    {
    return $this->device_token;
    }
    
}
