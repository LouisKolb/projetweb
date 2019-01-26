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
          return redirect()->back();
      }
      //check if admin
      $user = user::find(session()->get('user')[0]);
      if (!$user->hasRole('admin')) {
        return redirect()->back();
      }
      //dowload the pdf
        $event= event::find($id);
        $pdf = PDF::loadView('event.pdf', compact('event'));
        $name = "commandeNo-".$event->id.".pdf";
        return $pdf->download($name);
    }
}
