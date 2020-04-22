<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getBestAnswerAttribute()
    {
        if($this->best_reply_id){
            return "text-green-400 bg-green-200 ";  
        }
        else{
            return " ";
        }
    }

    public function acceptBestReply(Reply $reply)
    {
        $this->best_reply_id = $reply->id;
        $this->save();
    }
}
