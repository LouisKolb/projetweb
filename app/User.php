<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    protected $fillable  = ['username','first_name','last_name','email','password'];
}
