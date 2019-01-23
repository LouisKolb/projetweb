<?php

namespace App;
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


}
