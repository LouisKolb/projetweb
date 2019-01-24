<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use PDF;

class PdfController extends Controller
{
    public function print($id)
    {
        $event= event::find($id);
        $pdf = PDF::loadView('event.pdf', compact('event'));
        $name = "commandeNo-".$event->id.".pdf";
        return $pdf->download($name);
    }
}
