<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    public function packages()
    {
        return $this->belongsToMany('App\Package');
    }
}
