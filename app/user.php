<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
    //
    protected $fillable = [
        'first_name', 'last_name','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

    public function jobseeker()
    {
        return $this->hasOne('App\jobseeker');
    }


    public function jobPostActivity()
    {
        return $this->hasMany('App\jobPostActivity');
    }

}
