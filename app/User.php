<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAddress()
    {
        //return $this->hasOne(Address::class);
        return $this->hasOne('App\Address','user_id', 'id');

    }
    public function getPost()
    {
        //return $this->hasOne(Address::class);
        return $this->hasMany('App\Post','user_id', 'id');

    }

    function roles(){
        return $this->belongsToMany(Role::class, 'role_users');
    }

  
}
