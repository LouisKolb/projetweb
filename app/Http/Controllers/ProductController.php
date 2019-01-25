<?php

namespace App\Http\Controllers;

use App\product;
use App\picture;
use App\category;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $categories=category::get();
        return view("product.all", compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      if(!session()->has('user'))
      {
        return redirect("/product");
      }

      $user = user::find(session()->get('user')[0]);

      if (!$user->hasRole('admin'))
      {
        return redirect("/product");
      }

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
           $product->hide=0;


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
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
     public function update(product $product)
     {

       $product->id;
       $errors = array();
       $theprod = 'leproduit';


       foreach(request()->all() as $key => $value){
         if ($key == 'montrer')
         {
           if ($value == 'on') {
             $product->hide = 0;
           }
           if ($value == 'off') {
             $product->hide = 1;
           }
         }
         // echo $key;
         // echo ' : ';
         // echo $value;
         // echo '<br>';
         //echo $theprod;
         //var_dump(request()->all());
       }

       if(!session()->has('user')){
           array_push($errors,"Vous devez etre connecté pour ajouter un produit");
       }

       if(empty(request()->price) || empty(request()->description) ){
           array_push($errors,"Merci de compléter tout les champs!");
       }

       if (sizeof($errors)) {
         return redirect("product/{$product->id}/edit")->withErrors($errors)->withInput();
       }

      $product->name = request()->name;
      $product->description = request()->description;
      $product->price = request()->price;

      $product->save();

      return redirect("/product");

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
