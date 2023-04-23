<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Ticket;
use App\Models\Supplier;
use App\Models\Report;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;

class ReportController extends Controller
{
    public function reportpage()
    {
        return view('report.index');
    }
    public function todayreport(){
          
        $user_id = Auth::user()->id;

        $sale = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('salePrice');
        $purchase= DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('purchsasePrice');
        $profit  = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('profit');
        $recieved  = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->whereDate('date', now())->where('userId' , $user_id)->sum('paymentRemaining');

        return view('report.today',compact('sale','purchase','profit','recieved','remaining'));
    }

        // yajra box today
        public function todayTicket()
        {
            $user_id = Auth::user()->id;
            return Datatables::of(Ticket::query()->whereDate('date', now())->where('userId' , $user_id)->orderBy('id','desc'))
            ->editColumn('paymentMethod', function($paymentMethod) {
                return view('report.paymentMethod', compact('paymentMethod'));
            })
            ->make(true);
        }

    public function monthreport(){
        $user_id = Auth::user()->id;
       
        $month = date('Y-m');
        $sale = DB::table('tickets')->where('month', date('Y-m'),)->where('userId' , $user_id)->sum('salePrice');

        $purchase= DB::table('tickets')->where('month', date('Y-m'),)->where('userId' , $user_id)->sum('purchsasePrice');
        $profit  = DB::table('tickets')->where('month', date('Y-m'),)->where('userId' , $user_id)->sum('profit');
        $recieved  = DB::table('tickets')->where('month', date('Y-m'),)->where('userId' , $user_id)->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->where('month', date('Y-m'),)->where('userId' , $user_id)->sum('paymentRemaining');

        return view('report.monthly',compact('sale','purchase','profit','recieved','remaining'));
    }

     // yajra box month
     public function monthTicket()
     {
        $user_id = Auth::user()->id;
         return Datatables::of(Ticket::query()->where('month', date('Y-m'))->where('userId' , $user_id)->orderBy('id','desc'))
         ->editColumn('paymentMethod', function($paymentMethod) {
             return view('report.paymentMethod', compact('paymentMethod'));
         })
         ->make(true);
     }

     // search report
     public function searchreport(){
       
        
        $from_date = 0;
        $to_date = 0;
        $sale = 0;

        $purchase= 0;
        $profit  = 0;
        $recieved  = 0;
        $remaining  = 0;

        $datas = [];


        return view('report.search',compact('sale','purchase','profit','recieved','remaining','datas','from_date','to_date'));
    }

    // search report list
    public function searchreportList(Request $request){
        $user_id = Auth::user()->id;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        if($from_date > $to_date){
            $notification = array(
                'message' => 'From date must me lesser',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
        else{

            $sale = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->where('userId' , $user_id)->sum('salePrice');
            $purchase= DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->where('userId' , $user_id)->sum('purchsasePrice');
            $profit  = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->where('userId' , $user_id)->sum('profit');
            $recieved  = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->where('userId' , $user_id)->sum('paymentRecieved');
            $remaining  = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->where('userId' , $user_id)->sum('paymentRemaining');

            $datas = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->where('userId' , $user_id)->get();
            return view('report.search',compact('sale','purchase','profit','recieved','remaining','datas','from_date','to_date'));

        }
    }


    public function todayexpense(){
          

        $expense = DB::table('expenses')->whereDate('date', now())->sum('price');

        return view('report.expense.today',compact('expense'));
    }

        // yajra box today
        public function todayExpenseGet()
        {
            return Datatables::of(Expense::query()->whereDate('date', now())->orderBy('id','desc'))
            ->make(true);
        }

    public function monthexpense(){
        

        $expense = DB::table('expenses')->where('month', date('Y-m'))->sum('price');

        return view('report.expense.month',compact('expense'));
    }

    // yajra box month
    public function monthExpenseGet()
    {
        return Datatables::of(Expense::query()->where('month', date('Y-m'))->orderBy('id','desc'))
        ->make(true);
    }



    // searchexpense
     public function searchexpense(){
       
        
        $from_date = 0;
        $to_date = 0;
        $expense = 0;

        $datas = [];


        return view('report.expense.search',compact('expense','datas','from_date','to_date'));
    }

    // search report list
    public function searchexpenseList(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        if($from_date > $to_date){
            $notification = array(
                'message' => 'From date must me lesser',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
        else{

            $expense = DB::table('expenses')->whereBetween('date',[$from_date , $to_date])->sum('price');


            $datas = DB::table('expenses')->whereBetween('date',[$from_date , $to_date])->get();
            return view('report.expense.search',compact('expense','datas','from_date','to_date'));

        }
    }






















    
    public function overalltodayreport(){
          

        $sale = DB::table('tickets')->whereDate('date', now())->sum('salePrice');
        $purchase= DB::table('tickets')->whereDate('date', now())->sum('purchsasePrice');
        $profit  = DB::table('tickets')->whereDate('date', now())->sum('profit');
        $recieved  = DB::table('tickets')->whereDate('date', now())->sum('paymentRecieved');
        $remaining  = DB::table('tickets')->whereDate('date', now())->sum('paymentRemaining');

        return view('report.overall.today',compact('sale','purchase','profit','recieved','remaining'));
    }

        // yajra box today
        public function overalltodayTicket()
        {
            $user_id = Auth::user()->id;
            return Datatables::of(Ticket::query()->whereDate('date', now())->orderBy('id','desc'))
            ->editColumn('paymentMethod', function($paymentMethod) {
                return view('report.paymentMethod', compact('paymentMethod'));
            })
            ->make(true);
        }








        public function overallmonthreport(){
            $user_id = Auth::user()->id;
           
            $month = date('Y-m');
            $sale = DB::table('tickets')->where('month', date('Y-m'),)->sum('salePrice');
    
            $purchase= DB::table('tickets')->where('month', date('Y-m'),)->sum('purchsasePrice');
            $profit  = DB::table('tickets')->where('month', date('Y-m'),)->sum('profit');
            $recieved  = DB::table('tickets')->where('month', date('Y-m'),)->sum('paymentRecieved');
            $remaining  = DB::table('tickets')->where('month', date('Y-m'),)->sum('paymentRemaining');
    
            return view('report.overall.monthly',compact('sale','purchase','profit','recieved','remaining'));
        }
    
         // yajra box overallmonthTicket
         public function overallmonthTicket()
         {
            $user_id = Auth::user()->id;
             return Datatables::of(Ticket::query()->where('month', date('Y-m'))->orderBy('id','desc'))
             ->editColumn('paymentMethod', function($paymentMethod) {
                 return view('report.paymentMethod', compact('paymentMethod'));
             })
             ->make(true);
         }


         public function overallsearchreport(){
       
        
            $from_date = 0;
            $to_date = 0;
            $sale = 0;
    
            $purchase= 0;
            $profit  = 0;
            $recieved  = 0;
            $remaining  = 0;
    
            $datas = [];
    
    
            return view('report.overall.search',compact('sale','purchase','profit','recieved','remaining','datas','from_date','to_date'));
        }
        
    





        public function overallsearchreportList(Request $request){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            if($from_date > $to_date){
                $notification = array(
                    'message' => 'From date must me lesser',
                    'alert_type' => 'warning'
                );
                return Redirect()->back()->with($notification);
            }
            else{
    
                $sale = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->sum('salePrice');
                $purchase= DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->sum('purchsasePrice');
                $profit  = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->sum('profit');
                $recieved  = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->sum('paymentRecieved');
                $remaining  = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->sum('paymentRemaining');
    
                $datas = DB::table('tickets')->whereBetween('date',[$from_date , $to_date])->get();
                return view('report.overall.search',compact('sale','purchase','profit','recieved','remaining','datas','from_date','to_date'));
    
            }
        }
}