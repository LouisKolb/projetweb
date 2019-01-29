<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class PdfController extends Controller
{
    public function print($id)
    {
      //check if the user is connected
      if(!session()->has('user'))
      {
          //go to the previous page
          return redirect()->back();
      }
      //get the user
      $user = user::find(session()->get('user')[0]);
      //check if admin
      if (!$user->hasRole('admin'))
      {
        //go to the previous page
        return redirect()->back();
      }
        //find the id
        $event= event::find($id);
        $pdf = PDF::loadView('event.pdf', compact('event'));
        //change the name of the pdf
        $name = "commandeNo-".$event->id.".pdf";
        //dowload the pdf
        return $pdf->download($name);
    }
}
