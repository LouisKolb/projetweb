<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\order;
use App\product;
use App\user;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(order $order)
    {
        $errors = array();
        $productexist = product::where('id',request()->product_id)->count();
        if(!$productexist){
            array_push($errors,"Le produit n'existe pas");
        }
        if(request()->quantity<0){
            array_push($errors,"Nope petit malin vous ne pouvez pas mettre une quantitée négative");
        }

        if($errors){
            return redirect()->back()->withErrors($errors)->withInput();
        }
        
        
        
        
        
        $order->addProduct(request()->product_id,request()->quantity);



        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }

    public function deletefromcart(product $product){
        $cart = user::find(session()->get('user')[0])->cart();
        DB::table('product_order')->where('product_id',$product->id)->where('order_id',$cart->id)->delete();
        return redirect()->back();
    }





}
