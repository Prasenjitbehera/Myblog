<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'post_content'
    ];
    //

    public function user()
    {
        //return $this->hasOne(Address::class);
        return $this->belongsTo('App\User');
    }
    public function getComment()
    {
        //return $this->hasOne(Address::class);
        return $this->hasMany('App\Comment','post_id', 'id');
    }
    public function morphic_comments()
    {
        return $this->morphMany(MorphicComments::class, 'commentable');
    }
}
