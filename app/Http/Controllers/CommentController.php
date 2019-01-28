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
    $connected = false;
    if(session()->has('user')){
        $connected = true;
        $user = user::find(session()->get('user')[0]);
    }
    if($connected){
        
       var_dump(request()->all());
       $comment = new comment();
       $comment->user_id=$user->id;
       $comment->picture_id=request()->picture;
       $comment->content =request()->comment;
       $comment->save();
    }
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
    public function destroy(comment $comment)
    {
        //
    }

    public function signal(){
        $title = "Signalement";
        $link = 'http://localhost:8000/coment/'.$this->id;
        $content =view('mail.signal',compact('link'));
        
        foreach(user::get() as $user){
            if($user->hasRole('Admin')){
                $user->sendMail($title,$content);
                
            }
        }
    }

}
