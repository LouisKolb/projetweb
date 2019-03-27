<?php

namespace App\Http\Controllers;

use App\Question;
use App\CategoryForum;
use App\user;
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

        if(empty(request()->name) || empty(request()->description) ){
            array_push($errors,"Merci de compléter tout les champs et de choisir une catégorie ");
        }

         if (sizeof($errors)) {

            return redirect('forum/question-create')->withErrors($errors)->withInput();
        }

        
           //var_dump(request()->all());


        $questions = new Question();
        $questions->name = request()->name;
        $questions->description=request()->description;
        $questions->categorie=request()->category_forum;
        $questions->user_id=session()->get('user')[0];
        $questions->prive=isset($_POST['public']);
        $questions->save();


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
        //go to the view sujet
        return view('questionForum.show', compact('question',)); 
           }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //go to edit view of sujet
        $CategoryForum=CategoryForum::get();
        return view('questionForum.edit', compact('question','CategoryForum')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(question $question)
    {
        $question->name = request()->name;
        $question->description = request()->description;
        $question->categorie = request()->CategoryForum;
        $question->update();
     return redirect('/forum');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        
        if(session()->has('user')){
          //if the user is an admin
          if(user::find(session()->get('user')[0])->hasRole('admin')){
            //delete the comment

            $question->delete();
            
          }
        } 
        return redirect('/forum');   
    }
}
