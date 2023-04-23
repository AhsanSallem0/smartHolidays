<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use auth;
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

    // today pdf
    public function todayPdf(Request $request){
        $user_id = Auth::user()->id;

        $sale = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('salePrice');
        $purchase= DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('purchsasePrice');
        $profit  = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('profit');
        $recieved  = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('paymentRemaining');

        $datas = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->orderBy('id','desc')->get();

      $pdf = Pdf::loadView('pdf.todayPDF',[
          'sale' => $sale,
          'purchase' => $purchase,
          'profit' => $profit,
          'recieved' => $recieved,
          'remaining' => $remaining,
          'datas' => $datas,
      ]);
      return $pdf->download('todayPDF.pdf'); 

  }


   // today pdf
   public function monthPdf(Request $request){
    $user_id = Auth::user()->id;
        $month = date('Y-m');
    
        $sale = DB::table('tickets')->where('month', date('Y-m'))->where('userId' , $user_id)->sum('salePrice');
        $purchase= DB::table('tickets')->where('month', date('Y-m'))->where('userId' , $user_id)->sum('purchsasePrice');
        $profit  = DB::table('tickets')->where('month', date('Y-m'))->where('userId' , $user_id)->sum('profit');
        $recieved  = DB::table('tickets')->where('month', date('Y-m'))->where('userId' , $user_id)->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->where('month', date('Y-m'))->where('userId' , $user_id)->sum('paymentRemaining');

        $datas = DB::table('tickets')->where('month', date('Y-m'))->where('userId' , $user_id)->orderBy('id','desc')->get();

        $pdf = Pdf::loadView('pdf.monthPDF',[
            'sale' => $sale,
            'purchase' => $purchase,
            'profit' => $profit,
            'recieved' => $recieved,
            'remaining' => $remaining,
            'datas' => $datas,
        ]);
        return $pdf->download('monthPDF.pdf'); 

    }

       // searchPDF 
   public function searchPDF(Request $request){
    $user_id = Auth::user()->id;
        $get_from_date = $request->get_from_date;
        $get_to_date = $request->get_to_date;
        

            $sale = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->where('userId' , $user_id)->sum('salePrice');
            $purchase= DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->where('userId' , $user_id)->sum('purchsasePrice');
            $profit  = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->where('userId' , $user_id)->sum('profit');
            $recieved  = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->where('userId' , $user_id)->sum('paymentRecieved');
            $remaining  = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->where('userId' , $user_id)->sum('paymentRemaining');

            $datas = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->where('userId' , $user_id)->get();


        $pdf = Pdf::loadView('pdf.searchPDF',[
            'sale' => $sale,
            'purchase' => $purchase,
            'profit' => $profit,
            'recieved' => $recieved,
            'remaining' => $remaining,
            'datas' => $datas,
            'get_from_date' => $get_from_date,
            'get_to_date' => $get_to_date,
        ]);
        return $pdf->download('searchPDF.pdf'); 

    }

       // todayExpensePdf
    public function todayExpensePdf(Request $request){

        $expense = DB::table('expenses')->whereDate('date', now())->sum('price');

        $datas = DB::table('expenses')->whereDate('date', now())->orderBy('id','desc')->get();

        $pdf = Pdf::loadView('pdf.todayExpensePdf',[
            'expense' => $expense,
            'datas' => $datas,
        ]);

      return $pdf->download('todayExpensePdf.pdf'); 

  }

        // monthExpensePdf
    public function monthExpensePdf(Request $request){

        $expense = DB::table('expenses')->where('month', date('Y-m'))->sum('price');

        $datas = DB::table('expenses')->where('month', date('Y-m'))->orderBy('id','desc')->get();

        $pdf = Pdf::loadView('pdf.monthExpensePdf',[
            'expense' => $expense,
            'datas' => $datas,
        ]);

        return $pdf->download('monthExpensePdf.pdf'); 
    }


    // searchExpensePDF
    public function searchExpensePDF(Request $request){
        $get_from_date = $request->get_from_date;
        $get_to_date = $request->get_to_date;
    

            $expense = DB::table('expenses')->whereBetween('date',[$get_from_date , $get_to_date])->sum('price');

            $datas = DB::table('expenses')->whereBetween('date',[$get_from_date , $get_to_date])->get();


        $pdf = Pdf::loadView('pdf.searchExpensePDF',[
            'expense' => $expense,
            'datas' => $datas,
            'get_from_date' => $get_from_date,
            'get_to_date' => $get_to_date,
        ]);
        return $pdf->download('searchExpensePDF.pdf'); 

    }












     // today pdf
     public function overalltodayPdf(Request $request){
        $user_id = Auth::user()->id;

        $sale = DB::table('tickets')->whereDate('date', now())->sum('salePrice');
        $purchase= DB::table('tickets')->whereDate('date', now())->sum('purchsasePrice');
        $profit  = DB::table('tickets')->whereDate('date', now())->sum('profit');
        $recieved  = DB::table('tickets')->whereDate('date', now())->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->whereDate('date', now())->sum('paymentRemaining');

        $datas = DB::table('tickets')->whereDate('date', now())->orderBy('id','desc')->get();

      $pdf = Pdf::loadView('pdf.overalltodayPdf',[
          'sale' => $sale,
          'purchase' => $purchase,
          'profit' => $profit,
          'recieved' => $recieved,
          'remaining' => $remaining,
          'datas' => $datas,
      ]);
      return $pdf->download('overalltodayPdf.pdf'); 

  }



  public function overallmonthPdf(Request $request){
    $user_id = Auth::user()->id;
        $month = date('Y-m');
    
        $sale = DB::table('tickets')->where('month', date('Y-m'))->sum('salePrice');
        $purchase= DB::table('tickets')->where('month', date('Y-m'))->sum('purchsasePrice');
        $profit  = DB::table('tickets')->where('month', date('Y-m'))->sum('profit');
        $recieved  = DB::table('tickets')->where('month', date('Y-m'))->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->where('month', date('Y-m'))->sum('paymentRemaining');

        $datas = DB::table('tickets')->where('month', date('Y-m'))->orderBy('id','desc')->get();

        $pdf = Pdf::loadView('pdf.overallmonthPdf',[
            'sale' => $sale,
            'purchase' => $purchase,
            'profit' => $profit,
            'recieved' => $recieved,
            'remaining' => $remaining,
            'datas' => $datas,
        ]);
        return $pdf->download('overallmonthPdf.pdf'); 

    }






          // searchPDF 
   public function overallsearchPDF(Request $request){
    $user_id = Auth::user()->id;
        $get_from_date = $request->get_from_date;
        $get_to_date = $request->get_to_date;
        

            $sale = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->sum('salePrice');
            $purchase= DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->sum('purchsasePrice');
            $profit  = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->sum('profit');
            $recieved  = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->sum('paymentRecieved');
            $remaining  = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->sum('paymentRemaining');

            $datas = DB::table('tickets')->whereBetween('date',[$get_from_date , $get_to_date])->get();


        $pdf = Pdf::loadView('pdf.overallsearchPDF',[
            'sale' => $sale,
            'purchase' => $purchase,
            'profit' => $profit,
            'recieved' => $recieved,
            'remaining' => $remaining,
            'datas' => $datas,
            'get_from_date' => $get_from_date,
            'get_to_date' => $get_to_date,
        ]);
        return $pdf->download('overallsearchPDF.pdf'); 

    }



    

}
