<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
