<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [
        'post_id', 'comment'
    ];
    //
    public function post()
    {
        //return $this->hasOne(Address::class);
    
        return $this->belongsTo('App\Post');

    }
    public function comments()
    {
        //return $this->morphMany('App\MorphicComments', 'commentable');
        return $this->morphMany(MorphicComments::class, 'commentable');
    }
  
}
