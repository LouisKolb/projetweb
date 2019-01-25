<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function picture(){
        return $this->hasOne('App\Picture','id');
    }
    public function categoryName(){
        $cat = DB::table('categories')->where('id',$this->category)->first();
        return $cat->name;
    }
}