<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function thread()
    {
       return $this->belongsTo(Thread::class);
    }

    public static function booted(){
        static::created(function($replies){
            $replies->thread->increment('reply_count');
        });

        static::deleted(function($replies){
            $replies->thread->decrement('reply_count');
        });
    }
}
