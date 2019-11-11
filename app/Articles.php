<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
