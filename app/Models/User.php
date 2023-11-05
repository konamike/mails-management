<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

  

     const ROLE_ADMIN = 'ADMIN';
     const ROLE_MD = 'MD'; //MD/CEO Role
     const ROLE_CoS = 'CoS'; //Chief of Staff Role
     const ROLE_ENGINEER = 'ENGINEER';
     const ROLE_USER = 'USER';


     const ROLES = [
        self::ROLE_ADMIN => 'Admin' , 
        self::ROLE_MD => 'MD' , 
        self::ROLE_CoS => 'CoS',
        self::ROLE_ENGINEER => 'Engineer',
        self::ROLE_USER => 'User'
    ];
    



    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_Admin() || $this->is_User() || $this->is_Engineer();
    }

    public function is_Admin()
    {
       return $this->role === self::ROLE_ADMIN;
    }
    public function is_MD()
    {
       return $this->role === self::ROLE_MD;
    }
    public function is_CoS()
    {
       return $this->role === self::ROLE_CoS;
    }

    public function is_Engineer()
    {
       return $this->role === self::ROLE_ENGINEER;
    }

    public function is_User()
    {
       return $this->role === self::ROLE_USER;
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
