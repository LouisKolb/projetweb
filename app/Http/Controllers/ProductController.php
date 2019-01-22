<?php

namespace App\Http\Controllers;

use App\product;
use App\picture;
use App\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= product::get();
        return view("product.all", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::get();
        return view("product.create",compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = array();

        $file = request()->file('image');

        if(!session()->has('user')){
            array_push($errors,"Vous devez etre connecté pout proposer un éventment");
        }

        if(empty(request()->name) || empty(request()->imagetext) ||empty(request()->price) ||empty(request()->category) || empty(request()->description) ){
            array_push($errors,"Merci de compléter tout les champs et de poster une image ");
        }

        if($file){
        
            $size = $file->getSize();
            if($size > 5242880){
                 array_push($errors, "Le fichier est trop volumineux");
             }
 
             $ext = $file->getClientOriginalExtension();
             if(!preg_match('/(jpg|jpeg|gif|png)$/',$ext)){
                 
                array_push($errors,'Seuls les gif png , jpg ou kpeg sont acceptés');
             }
 
        }
         if (sizeof($errors)) {
       
            return redirect('product/create')->withErrors($errors)->withInput();
           }

           //var_dump(request()->all());
           

           $product = new product();
           $product->name = request()->name;
           $product->description=request()->description;
           $product->price = request()->price;
           $product->category=request()->category;


            //pour store l'image
            $path = request()->image->store('/public/pictures');
            $path=str_replace('public/','',$path);
            $image = new picture();
            $image->user_id=session()->get('user')[0];
            $image->link= $path;
            
            $image->save();
            
            
            $product->image=picture::where('link',$path)->first()->id;
            $product->save();


            return redirect('/product');




















    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("product.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

    public function order(){
        return view("product.order");
    }

}
