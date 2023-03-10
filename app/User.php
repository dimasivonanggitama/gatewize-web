<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password', 'address', 'username', 'telegram', 'balance', 'license_key', 'role_id', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatar( $size = 64 ) {
       return $this->getGravatar( $this->email, $size );
    }

    public function isAdmin()
    {
        return $this->hasRole('superadmin');
    }

    public function hasRole($role)
    {
        return str_replace(' ','',strtolower($this->role->name)) == $role;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function balanceHistories()
    {
        return $this->hasMany(BalanceHistory::class);
    }
}
