<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //

    protected $fillable = [
        'body'
    ];

    public function morphic_comments()
    {
        //return $this->morphMany('App\MorphicComments', 'commentable');
        return $this->morphMany(MorphicComments::class, 'commentable');
    }
}
