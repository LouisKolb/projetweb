<?php

namespace App\Http\Controllers;
use App\user;
use App\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function store()
    {
    //set the connection to false
    $connected = false;

          //check if the user is connected
          if(session()->has('user')){
              //set the connection to true
              $connected = true;
              //get the user
              $user = user::find(session()->get('user')[0]);
          }

          //if the connection is true
          if($connected){

             //create a new comment
             $comment = new comment();
             //fill it with the data
             $comment->user_id=$user->id;
             $comment->picture_id=request()->picture;
             $comment->content =request()->comment;
             //save the comment
             $comment->save();
          }

    //go to the previous page
    return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        return view('comment.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */

    //function to delete a comment
    public function destroy(comment $comment)
    {
        //if the user is connected
        if(session()->has('user')){
          //if the user is an admin
          if(user::find(session()->get('user')[0])->hasRole('admin')){
            //delete the comment
            $comment->delete();
          }
        }

        //go to the previous page
        return redirect()->back();

    }

    //fonction to report a comment
    public function signal($comment){
        //set the connection to false
        $connected = false;
        //check if the user is connected
        if(session()->has('user')){
            //get the user
            $user = user::find(session()->get('user')[0]);
            //check if the user has the role tutor
            if($user->hasRole('tutor')){
                $comment = comment::find($comment);
                $comment->signal();

            }
        }
    }

}
