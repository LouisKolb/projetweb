<?php

namespace App\Http\Controllers;

use App\event;
use Illuminate\Http\Request;

class EventController extends Controller
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
      //$interval = $datetime->diff($dateevent);
      //$interval = date_diff($dateevent, $datetime);

       if ($outdated) {
           array_push($errors, "La date ne peut pas être antérieur à aujourd'hui");
       }
       if ($errors) {
           return response()->json([
               'errors' => $errors,
           ], 418); //Im a tea Pot
       }

        var_dump(request()->all());

        $event = new Event();
        $event->name = request()->name;
        $event->description = request()->description;
        $event->date = request()->date;
        // $event->picture = request()->picture;
        $event->statut = 0;

        $event->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $events)
    {
        $events= event::orderBy('date','asc')->get();
        return view('event.show',compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        //
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
}
