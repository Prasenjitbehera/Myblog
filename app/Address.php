<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'user_id', 'location'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
