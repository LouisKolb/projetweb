<?php

namespace App\Http\Controllers;

//
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

    //events that are validated
    public function index()
    {
      //order by date validated events
      $events= event::where('statut',1)->orderBy('date','asc')->get();
      $today = date('Y-m-d');
      $modif = false;
      foreach ($events as $event) {
          if($event->recurency() && $event->date < $today){
              $date = new \DateTime($event->date);
              $recurency=$event->recurency();
              $date->modify("+$recurency day");
              $event->date=$date;
              $event->save();
              $modif=true;
          }
      }
      if($modif){
        $events= event::where('statut',1)->orderBy('date','asc')->get();
      }




      return view("event.all",compact('events'));
    }

    //events that are not validated
    public function idea(){
      //order by date events that are not validated
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
        //If the person is not connected
        if(!session()->has('user'))
        {
          //go to
          return redirect("/event");
        }
        //else, return
        return view("event.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function delete($id){

       //place errors inside an array
       $errors = array();

       if ($errors) {
           return response()->json([
               'errors' => $errors,
           ], 418); //Im a tea Pot
       }

       //cath the event id and delete it
       $event->removeRecurency();
       $event = Event::destroy($id);
       return redirect('/event');


     }

    public function accept($id){
      //place errors inside an array
      if(!session()->has('user'))
      {
          return redirect("/product");
      }

      $user = user::find(session()->get('user')[0]);

      if (!$user->hasRole('admin'))
      {
        return redirect("/product");
      }

      $errors = array();

      if ($errors) {
          return response()->json([
              'errors' => $errors,
          ], 418); //Im a tea Pot
      }

      //find the event id
      $event = Event::find($id);
      //turn the boolean to true if the event is validate (1 for true)
      $event->statut=1;
      //send a mail to the creator
      $user = user::find($event->user_id);
      $content = view('mail.validevent',compact('event','user'));
      $user->sendMail('Idée acceptée',$content);



      //save
      $event->save();
      //return to the event page
      return redirect('/event');


    }

    public function annule($id){
      //place errors inside an array
      $errors = array();

      if ($errors) {
          return response()->json([
              'errors' => $errors,
          ], 418); //Im a tea Pot
      }

      //find the event id
      $event = Event::find($id);
      //turn the boolean to false if the event is'nt validate (0 for false)
      $event->statut=0;
      //save
      $event->save();
      //go to event page
      return redirect('/event');
    }

    //fonction to create a new event
    public function store()
    {
      //errors placed inside an array
      $errors = array();
      //cath the date given by the user and change string to date
      $timeevent = strtotime(request()->date);
      //define date format
      $dateevent = date('Y-m-d', $timeevent);
      //current date
      $datetime = date('Y-m-d');
      //compared both dates
      $outdated = $dateevent < $datetime;



      //cath the picture file given by the user
      $file = request()->file('image');
      //error if the user is not connected
      if(!session()->has('user')){
          array_push($errors,"Vous devez etre connecté pout proposer un éventment");
      }

      //error if one of fields belows is not completed
      if(empty(request()->name)|| empty(request()->date) || empty($file) || empty(request()->description) || request()->recurency  <0 ){
          array_push($errors,"Merci de compléter tout les champs et de poster une image ");

      }

      //error if the date given by the user is outdated
       if ($outdated) {
           array_push($errors, "La date ne peut pas être antérieur à aujourd'hui");
       }

       //error for the picture
       if($file){

           $size = $file->getSize();
           //if the size is to big
           if($size > 5242880){
                array_push($errors, "La taille ne peut pas etre superieur a 5Mo");
            }

            $ext = $file->getClientOriginalExtension();
            //if the extension is different from one below
            if(!preg_match('/(jpg|jpeg|gif|png)/',$ext)){
               array_push($errors,'Seuls les gif png , jpg ou kpeg sont acceptés');
            }
       }


       //print the error in event create page
       if (sizeof($errors)) {
        return redirect('event/create')->withErrors($errors)->withInput(request()->input());
       }

       //check if the event need to be directly validate
       $statut = 0;
       $user= user::find(session()->get('user')[0]);


       if (!empty(request()->direct)) {
            $statut = 1;
            if (!$user->hasRole('admin')) {
                array_push($errors, "Vous n'etes pas Admin");
                return redirect('event/create')->withErrors($errors)->withInput(request()->input());
            }
        }







       //create a new event object
        $event = new Event();

        //add price and recurrency

        $event->price =request()->price;




        //complete the field with the data
        $event->name = request()->name;
        $event->user_id = session()->get('user')[0];
        $event->description = request()->description;
        $event->date = request()->date;
        $event->statut = $statut;
        //save all
        $event->save();
        $event->addRecurency(request()->recurency);

        //store the picture
        $path = request()->image->store('/public/pictures');
        $path=str_replace('public/','',$path);


        //create a new picture object
        $image = new picture();
        $image->user_id=session()->get('user')[0];
        $image->link= $path;
        $image->save();


        //add picture to an event
        $event->addPicture($image->id);
        //go to event idea
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
        //go to the view event
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
        //go to the view edit
        return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */

     //update an event
    public function update(event $event)
    {

      //Same as the function store
      $event->id;
      $errors = array();

      $timeevent = strtotime(request()->date);
      $dateevent = date('Y-m-d', $timeevent);
      $datetime = date('Y-m-d');
      $outdated = $dateevent < $datetime;
      $file = request()->file('image');

      if(!session()->has('user')){
          array_push($errors,"Vous devez être connecté pout proposer un événement");
      }else{
          $user = user::find(session()->get('user')[0]);
          if(!$user->hasRole('admin')){
            array_push($errors,"Vous n'avez pas la permission d'editer cet événement");
          }
      }


      if(empty(request()->name)|| empty(request()->date) || empty(request()->description)){
          array_push($errors,"Merci de compléter tout les champs et de poster une image ");
      }

      if(request()->recurency < 0){
        array_push($errors, "La récurrence ne peut pas être inférieur ou égale à 0");
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

               array_push($errors,'Seuls les gif png , jpg ou jpeg sont acceptés');
            }
       }

       if (sizeof($errors)) {

        return redirect("event/{$event->id}/edit")->withErrors($errors)->withInput();
       }

       foreach (request()->all() as $key => $value) {
            //if the user delete the picture
            if ($value == 'on') {
                $picture = picture::find($key);
                //delete the file of the picture
                foreach ($event->pictures as $p) {
                    if ($p->id == $key) {
                        $p->removeFromStorage(); //remove from storage
                        DB::table('event_picture')->where('picture_id', $key)->where('event_id', $event->id)->delete(); //remove link schema
                        $p->delete(); //delete picture in db
                    }
                }
            }
        }






        $event->price=request()->price;
        $event->name = request()->name;
        $event->user_id = session()->get('user')[0];
        $event->description = request()->description;
        $event->date = request()->date;

        $event->statut = 0;

        $event->save();
        $event->removeRecurency();
        $event->addRecurency(request()->recurency);


        //store the picture



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

    //fonction to vote for a picture
    public function vote($event){

        if(session()->has('user')){
            //find the user
            $user = user::find(session()->get('user')[0]);
            //if he has'nt voted
            if(!$user->hasVotedForEvent($event)){
                //vote
                $user->voteForEvent($event);

            }else{
              //delete the vote
                $user->unVoteForEvent($event);

            }
        }
        //place the user on the page where it is located
        return redirect()->back();
    }

    //subscribe to an event
    public function subscribe($event){
        //if the user is connected
        if(session()->has('user')){
            //find the user
            $user = user::find(session()->get('user')[0]);
            //check if he is a subscriber
            if($user->hasSubscribedToEvent($event)){
                $user->unSubscribeToEvent($event);
            }else{

                $user->subscribeToEvent($event);
            }
        }

        //place the user on the page where it is located
        return redirect()->back();
    }

    //for uploadding multiple photos
    public function upload(){

        $errors = array();
        //check if all fields are complet
        if(empty(request()->event)){
            array_push($errors,"Merci de remplir tour les champs");
        }
        else{
            $event=event::find(request()->event);
            if(!$event->statut){
                array_push($errors,"Vous ne pouvez pas poster de photos sur les idées d'évènements");
            }
        }

        if(session()->has('user')){
            $user = user::find(session()->get('user')[0]);
            //if the user did not participate in the event
            if(!$user->hasSubscribedToEvent(request()->event)){
                array_push($errors,"Vous devez avoir participé a l'évènement pour cela");
            }

        }else{
            array_push($errors,"Vous devez etre conecté pour effectuer cela");
        }



        $images = request()->images;
        //for all picture of the request
        foreach($images as $image) {
          //check the extension
            $ext = $image->getClientOriginalExtension();
            if(!preg_match('/(jpg|jpeg|gif|png)/',$ext)){

               array_push($errors,'Seuls les gif png , jpg ou kpeg sont acceptés');
            }
            $size = $image->getSize();
            //check the size
           if($size > 5242880){
                array_push($errors, "Superieur a 5 Mo");
            }

        }
        //go to the previous page
        if($errors){
            return redirect()->back()->withErrors($errors);
        }

        //for all picture
        foreach($images as $image) {
            //cath the link
            $path = $image->store('/public/pictures');
            $path=str_replace('public/','',$path);
            //create a new picture
            $picture = new picture();
            $picture->user_id=session()->get('user')[0];
            $picture->link= $path;
            $picture->save();
            $event->addPicture($picture->id);

        }
        return redirect()->back();

    }

}
