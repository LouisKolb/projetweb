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

    public function signal(){
        $title = "Signalement";
        $link = 'http://localhost:8000/comment/'.$this->id;
        $content =view('mail.signal',compact('link'));
        
        foreach(user::get() as $user){
            if($user->hasRole('Admin')){
                $user->sendMail($title,$content);
                
            }
        }
    }
}
