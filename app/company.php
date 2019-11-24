<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class company extends Authenticatable
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'company_name','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];


    public function jobpost()
    {
        return $this->hasMany('App\jobpost');
    }
}
