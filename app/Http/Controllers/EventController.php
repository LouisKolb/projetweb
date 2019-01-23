<?php

namespace App\Http\Controllers;

use App\event;
use App\user;
use App\picture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $events= event::where('statut',1)->orderBy('date','asc')->get();
        return view("event.all",compact('events'));
    }
    public function idea(){
        $events =event::where('statut','0')->orderBy('created_at','asc')->get();
        return view('event.idea',compact('events'));
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
          return redirect("/event");
        }

        return view("event.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function delete($id){
       $errors = array();

       //var_dump($id);


       if ($errors) {
           return response()->json([
               'errors' => $errors,
           ], 418); //Im a tea Pot
       }

       $event = Event::destroy($id);
       return redirect('/event');


     }

    public function accept($id){
      $errors = array();

      //var_dump($id);


      if ($errors) {
          return response()->json([
              'errors' => $errors,
          ], 418); //Im a tea Pot
      }

      $event = Event::find($id);
      $event->statut=1;

      $event->save();
      return redirect('/event');


    }

    public function annule($id){
      $errors = array();

      //var_dump($id);


      if ($errors) {
          return response()->json([
              'errors' => $errors,
          ], 418); //Im a tea Pot
      }

      $event = Event::find($id);
      $event->statut=0;

      $event->save();
      return redirect('/event');


    }


    public function store()
    {
      $errors = array();
      $timeevent = strtotime(request()->date);
      $dateevent = date('Y-m-d', $timeevent);
      $datetime = date('Y-m-d');
      $outdated = $dateevent < $datetime;
      $file = request()->file('image');

      if(!session()->has('user')){
          array_push($errors,"Vous devez etre connecté pout proposer un éventment");
      }


      if(empty(request()->name)|| empty(request()->date) || empty($file) || empty(request()->description) ){
          array_push($errors,"Merci de compléter tout les champs et de poster une image ");
      }

       if ($outdated) {
           array_push($errors, "La date ne peut pas être antérieur à aujourd'hui");
       }


       if($file){

           $size = $file->getSize();
           if($size > 5242880){
                array_push($errors, "La date ne peut pas être antérieur à aujourd'hui");
            }

            $ext = $file->getClientOriginalExtension();
            if(!preg_match('/(jpg|jpeg|gif|png)/',$ext)){

               array_push($errors,'Seuls les gif png , jpg ou kpeg sont acceptés');
            }




       }



       if (sizeof($errors)) {

        return redirect('event/create')->withErrors($errors)->withInput();
       }



        $event = new Event();
        $event->name = request()->name;
        $event->user_id = session()->get('user')[0];
        $event->description = request()->description;
        $event->date = request()->date;

        $event->statut = 0;

        $event->save();


        //pour store l'image
        $path = request()->image->store('/public/pictures');
        $path=str_replace('public/','',$path);



        $image = new picture();
        $image->user_id=session()->get('user')[0];
        $image->link= $path;
        $image->save();

        $image=picture::where('link',$path)->first();
        $event=event::orderBy('id','desc')->first();

        $event->addPicture($image->id);
        return redirect("/event/idea");



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        return view('event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(event $event)
    {
      foreach(request()->all() as $key => $value){
        if ($value == 'on')
        {
          $picture = picture::find($key);

          foreach ($event->pictures as $p) {
            if($p->id==$key){
              $thefile = $p->link;
              $delfile = str_replace("pictures/","","$thefile");
              unlink(storage_path('app\public\pictures\\'.$delfile));
            }
          }


          DB::table('event_picture')->where('picture_id', $key)->where('event_id',$event->id)->delete();

            $picture->delete();
        }

      }





      $event->id;
      $errors = array();
      $timeevent = strtotime(request()->date);
      $dateevent = date('Y-m-d', $timeevent);
      $datetime = date('Y-m-d');
      $outdated = $dateevent < $datetime;
      $file = request()->file('image');

      if(!session()->has('user')){
          array_push($errors,"Vous devez etre connecté pout proposer un éventment");
      }


      if(empty(request()->name)|| empty(request()->date) || empty(request()->description) ){
          array_push($errors,"Merci de compléter tout les champs et de poster une image ");
      }

       if ($outdated) {
           array_push($errors, "La date ne peut pas être antérieur à aujourd'hui");
       }


       if($file){

           $size = $file->getSize();
           if($size > 5242880){
                array_push($errors, "La date ne peut pas être antérieur à aujourd'hui");
            }

            $ext = $file->getClientOriginalExtension();
            if(!preg_match('/(jpg|jpeg|gif|png)/',$ext)){

               array_push($errors,'Seuls les gif png , jpg ou kpeg sont acceptés');
            }




       }



       if (sizeof($errors)) {

        return redirect("event/{$event->id}/edit")->withErrors($errors)->withInput();
       }



        // $event = new Event();
        $event->name = request()->name;
        $event->user_id = session()->get('user')[0];
        $event->description = request()->description;
        $event->date = request()->date;

        $event->statut = 0;

        $event->save();


        //pour store l'image



        if (!empty($file)) {
          $path = request()->image->store('/public/pictures');
          $path=str_replace('public/','',$path);
          $image = new picture();
          $image->user_id=session()->get('user')[0];
          $image->link= $path;
          $image->save();

          $image=picture::where('link',$path)->first();


          $event->addPicture($image->id);
        }

        return redirect("/event/idea");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }


    public function vote($event){

        if(session()->has('user')){
            $user = user::find(session()->get('user')[0]);

            if(!$user->hasVotedForEvent($event)){

                $user->voteForEvent($event);
            }else{
                $user->unVoteForEvent($event);

            }

        }
        return redirect()->back();
    }





}
