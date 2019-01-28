<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\product;

class AdminController extends Controller
{
    //function show
    public function show()
    {
        //check if the user is connected
        $connected = session()->has('user');

        //if the user is connected ( connected == true)
        if($connected){

            //find the user and watch if the user is admin
            if(user::find(session()->get('user')[0])->hasRole('admin')){
                //get products
                $products = product::get();
                //return view admin.main with products
                return view('admin.main',compact('products'));
            }

            else
            {
                //go to home page
                return redirect("/");
            }

        }

        else
        {
            //go to home page
            return redirect("/");
        }

    }



}
