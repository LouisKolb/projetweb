<?php

namespace App;
use App\user;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function writer()
    {
        return user::find($this->user_id);
        
    }
}
