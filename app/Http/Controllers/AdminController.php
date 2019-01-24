<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\product;

class AdminController extends Controller
{
    public function show(){
        $connected = session()->has('user');
        if($connected){

            if(user::find(session()->get('user')[0])->hasRole('admin')){
                
                $products = product::get(); 
                
                return view('admin.main',compact('products'));
            }
            else{
    
                return redirect("/");
            
            }
        
        }else{
            return redirect("/");
        }
    }



}
