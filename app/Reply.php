<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $gurarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function thread()
    {
       return $this->belongsTo(Thread::class);
    }
}
