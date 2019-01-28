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
    public function cheatPrice(){
        $cheat = $this->price;
        while(strlen($cheat)<6){
            $cheat='0'.$cheat;
        }
        return $cheat;
    }

    public function orders(){
        return $this->belongsToMany('App\order','product_order','product_id','order_id');
    }
    public function countCommanded(){
        $counter = 0;
        foreach ($this->orders as $o) {
            $counter++;
        }
        return $counter;
    }

    
    public static function mostCommanded(){
        $products = product::get();
        $bests = product::bubbleSort($products);
        $count = count($bests)<3?count($bests)-1:3;
        $temp = array();
        foreach ($bests as $p) {
            array_push($temp,$p);
        }

        return array_slice($temp,0,$count);
        return $temp;
    }

    public static function bubbleSort($array){
        $size = count($array)-1;
        for ($i=0 ; $i < $size-1 ; $i++) {
            for ($j=0; $j < $size-$i; $j++) { 
                $k=$j+1;
                if($array[$k]->countCommanded()>$array[$j]->countCommanded()){
                    list($array[$j], $array[$k]) = array($array[$k], $array[$j]);
                }
            }
        }
        return $array;




    }

    


}