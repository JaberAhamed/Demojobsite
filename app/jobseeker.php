<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobseeker extends Model
{
    //

    protected $fillable = [
        'user_id', 'image','resume', 'skills',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
