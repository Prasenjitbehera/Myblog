<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MorphicComments extends Model
{
    //
    protected $fillable = [
        'comment_type', 'comment_id','body'
    ];
    public function commentable()
    {
        return $this->morphTo();
    }
}
