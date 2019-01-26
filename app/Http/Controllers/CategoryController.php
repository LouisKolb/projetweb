<?php

namespace App\Http\Controllers;
use App\category;
use App\user;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $conectet=false;
        $errors = array();
        
        if(session()->has('user')){
            $connected = true;
            $user = user::find(session()->get('user')[0]);
        }else{
            array_push($errors,'Vous devez etre conecté pour acceder a cette fonctionalité');
        }




        if($connected){
            if($user->hasRole('admin')){
        
                
                
                if(category::where('name',request()->category)->count()){
                    array_push($errors,'Cette catégorie existe déja'); 
                echo "Oui";  
                }

            
            }else{
                array_push($errors,'Vous devez etre conecté pour acceder a cette fonctionalité'); 
            }
            
        }
       




        if(sizeof($errors)){
            return redirect()->back()->withErrors($errors)->withInput(request()->input());
        }

        $cat = new category();
                $cat->name=request()->category;
                $cat->save();
        
        
        return redirect('/product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
