<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    public function comments(){
        return $this->hasMany('App\comment','picture_id');
    }
}
