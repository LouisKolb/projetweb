<?php

namespace App\Http\Controllers;

use App\CommentForum;
use App\user;
use App\Question;
use Illuminate\Http\Request;

class CommentForumController extends Controller
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
             $commentForums = new CommentForum();
             //fill it with the data
             $commentForums->user_id=$user->id;
             $commentForums->content =request()->commentForum;
             $commentForums->question_id=request()->IDquestion;
             //save the comment
             $commentForums->save();
          }

    //go to the previous page
    return redirect()->back();

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentForum  $commentForum
     * @return \Illuminate\Http\Response
     */
    public function show(CommentForum $commentForum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentForum  $commentForum
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentForum $commentForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentForum  $commentForum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentForum $commentForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentForum  $commentForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentForum $commentForum)
    {
        if(session()->has('user')){
          //if the user is an admin
          if(user::find(session()->get('user')[0])->hasRole('admin')){
            //delete the comment
            $commentForum->delete();
          }
        }

        //go to the previous page
        return redirect()->back();
    }

    public function signal($commentForum){
        
        $commentForum->statut=1;
        $commentForum->save();

        return redirect()->back();

        
    }
}
