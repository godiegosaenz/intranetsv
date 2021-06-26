<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
        'name',
        'lastname',
        'lastname2',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function scopeShowusers($query){
        $query->where('status', 1)
        ->orderBy('name');
    }*/

    public function getNameAttribute($name){
        return Str::upper($name);
    }

    public function getLastnameAttribute($lastname){
        return Str::upper($lastname);
    }

    public function getLastname2Attribute($lastname2){
        return Str::upper($lastname2);
    }

    public function getStatusAttribute($status){
        if($status == 1){
            return 'Activo';
        }

        return 'Inactivo';
    }
    public function scopeCountPermissionsDirects($query,$User)
    {
        return $User->getDirectPermissions()->count();
    }

    public function scopeisAdministrator($query){
        return Auth()->user()->hasRole('Super Administrador');
    }
}
