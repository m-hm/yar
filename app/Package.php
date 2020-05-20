<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function commodities()
    {
        return $this->belongsToMany('App\Commodity');
    }

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }
}
