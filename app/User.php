<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{

    use Notifiable;
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider','provider_id','avatar','firstname','lastname','birthday','gender','address','tel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //User Has Many Place
    public function places()
    {
        return $this->hasMany('App\Place');
    }

    //User Has Many Wisdom
    public function wisdoms()
    {
        return $this->hasMany('App\Wisdom');
    }
}
