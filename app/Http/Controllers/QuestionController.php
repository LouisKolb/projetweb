<?php

namespace App\Http\Controllers;

use App\Question;
use App\CategoryForum;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        //go the question create
        $category_forum=CategoryForum::get();
        return view('questionForum.create', compact('category_forum'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$errors = array();

        if(!session()->has('user')){
            array_push($errors,"Vous devez etre connecté pour ajouter un sujet");
        }

        if(empty(request()->name) || request()->category == 0 || empty(request()->description) ){
            array_push($errors,"Merci de compléter tout les champs et de choisir une catégorie ");
        }

         if (sizeof($errors)) {

            return redirect('forum/question-create')->withErrors($errors)->withInput();
        }

           //var_dump(request()->all());


           $questions = new questions();
           $questions->name = request()->name;
           $questions->description=request()->description;
           $questions->category=request()->category;


            //pour store l'image
            $path = request()->image->store('/public/pictures');
            $path=str_replace('public/','',$path);
            $image = new picture();
            $image->user_id=session()->get('user')[0];
            $image->link= $path;

            $image->save();


            $product->image=picture::where('link',$path)->first()->id;
            $product->save();


            return redirect('/forum');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
}
