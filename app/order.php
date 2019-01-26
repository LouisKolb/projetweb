<?php

namespace App;
use App\user;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    public function products(){
        return $this->belongsToMany('App\product','product_order')->withPivot('quantity');
    }

    public function price(){
        $price=0;
        foreach ($this->products as $p) {
            $price+=$p->price*$p->pivot->quantity;
        }
        return $price;
    }
    public function addProduct($productid,$quantity){
        
        DB::table('product_order')->where('order_id' , $this->id)->where('product_id' , $productid)->delete();
        
        DB::table('product_order')->insert([
            ['order_id' => $this->id, 'product_id' => $productid ,'quantity'=>$quantity]
            
            ]);
            
    }


    public function totalarticles(){
        $total = 0;
        foreach($this->products as $p){
            $total+=$p->pivot->quantity;

        }
        return $total;
    }

    public function user(){
        return user::find($this->user_id);
    }


    public function purchase(){
        $connected = false;
        if(session()->has('user')){
            $user=user::find(session()->get('user')[0]);
            $connected=true;
        }
        
        if($connected && $this->totalarticles()){
            $this->validate=true;
            $this->save();
            $title = "Commande N° $this->id";
            $order =$this;
           
            $content = view('mail.order',compact('order'));
            $this->user()->sendMail($title,$content);
            foreach(user::get() as $user){
                if($user->hasRole('Admin')){
                    $user->sendMail($title,$content);
                    
                }
            }
        }
         
        
    }




}
