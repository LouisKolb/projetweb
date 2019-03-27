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
        //go to the wiew category create
        return view('category.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //set $connected to false
        $connected=false;
        //put error inside an array
        $errors = array();

        //check if the user is connected
        if(session()->has('user'))
        {
            //set $connected to true
            $connected = true;
            //get the user in the database
            $user = user::find(session()->get('user')[0]);
        }

        else
        {
            //return error
            array_push($errors,'Vous devez etre connecté pour accéder a cette fonctionalité');
        }



        //if $connected is true
        if($connected){
          //check if the user is admin
            if($user->hasRole('admin')){

                //check if the category exist
                if(category::where('name',request()->category)->count())
                {
                    //returns an error
                    array_push($errors,'Cette catégorie existe déja');
                }

            }

            else
            {
                //returns an error
                array_push($errors,'Vous devez être conecté pour accéder a cette fonctionalité');
            }

        }


        //if errors
        if(sizeof($errors)){
            return redirect()->back()->withErrors($errors)->withInput(request()->input());
        }

        //create a new category
        $cat = new category();
                //get the name
                $cat->name=request()->category;
                //save the new category
                $cat->save();

        //go to product/create
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
