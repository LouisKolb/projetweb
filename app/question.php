<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    public function signal(){
        $title = "Signalement";
        $link = 'http://localhost:8000/sujet/'.$this->id;
        $content =view('mail.signal',compact('link'));
        
        foreach(user::get() as $user){
            if($user->hasRole('Admin')){
                $user->sendMail($title,$content);
                
            }
        }
    }}
