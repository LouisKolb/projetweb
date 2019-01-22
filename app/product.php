<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function picture(){
        return $this->hasOne('App\Picture','id');
    }
}
