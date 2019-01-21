<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class event extends Model
{
    
    public function pictures()
    {
        // return $this->hasMany('App\picture','event_picture');
        return $this->belongsToMany('App\picture','event_picture');
    }
    public function addPicture($pictureid){

        DB::table('event_picture')->insert([
            ['event_id' => $this->id, 'picture_id' => $pictureid]
        ]);

    }
}

