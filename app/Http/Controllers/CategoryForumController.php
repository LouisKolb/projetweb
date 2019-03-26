<?php

namespace App\Http\Controllers;

use App\CategoryForum;
use App\user;
use Illuminate\Http\Request;

class CategoryForumController extends Controller
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
        //go to the view category create for the forum
        return view('categoryForum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(!session()->has('user')){
            array_push($errors,"Vous devez etre connecté pour créer une cétégorie");
        }
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
                if(CategoryForum::where('name',request()->CategoryForum)->count())
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
        $cat = new CategoryForum();
                //get the name
                $cat->name=request()->CategoryForum;
                //save the new category
                $cat->save();

        //go to product/create
        return redirect('/forum');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryForum  $categoryForum
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryForum $categoryForum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryForum  $categoryForum
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryForum $categoryForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryForum  $categoryForum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryForum $categoryForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryForum  $categoryForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryForum $categoryForum)
    {
        //
    }
}
