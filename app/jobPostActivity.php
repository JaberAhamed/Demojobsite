<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobPostActivity extends Model
{
    
    protected $fillable = [
        'user_id','post_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jobpost()
    {
        return $this->belongsTo('App\jobpost');
    }
}
