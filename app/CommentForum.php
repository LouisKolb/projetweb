<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentForum extends Model
{
    public function writer()
    {
        return user::find($this->user_id);
        
    }
}
