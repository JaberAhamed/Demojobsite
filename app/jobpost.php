<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobpost extends Model
{
    //
    protected $fillable = [
        'company_id', 'job_title','job_description', 'salery','location','country',
    ];

    
     public function company()
    {
        return $this->belongsTo('App\company');
    }

    

    public function jobPostActivity()
    {
        return $this->hasMany('App\jobPostActivity');
    }
}
