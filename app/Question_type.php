<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_type extends Model
{
    //
    protected $fillable = [
        'title', 'icon', 'alias',
    ];
}
