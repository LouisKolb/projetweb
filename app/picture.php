<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    public function comments(){
        return $this->hasMany('App\comment','picture_id');
    }

    public function likes(){
        
        return DB::table('likes')->where('picture_id',$this->id)->get();
    }
    public function likeCount(){
        $counter = 0;
        foreach ($this->likes() as $like) {
            $counter++;
        }
        
        
        return $counter;
    }

    public function removeFromStorage(){
        $thefile = $this->link;
        $delfile = str_replace("pictures/","","$thefile");
        unlink(storage_path('app\public\pictures\\'.$delfile));
    }

    public function signal(){
        $title = "Signalement";
        $link = 'http://localhost:8000/picture/'.$this->id;
        $content =view('mail.signal',compact('link'));
        
        foreach(user::get() as $user){
            if($user->hasRole('Admin')){
                $user->sendMail($title,$content);
                
            }
        }
    }


}
