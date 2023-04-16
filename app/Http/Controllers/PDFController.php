<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    // ticket detail
    public function ticketPDF(Request $request,$id){

          $ticket = Ticket::where('id',$id)->first();

        $pdf = Pdf::loadView('pdf.ticketPDF',[
            'ticket' => $ticket
        ]);
        return $pdf->download('ticketPDF.pdf'); 

    }
}
