<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function packages()
    {
        return $this->belongsToMany('App\Package');
    }
    //
}
