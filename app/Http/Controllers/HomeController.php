<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pieChart = "";
        $user_id = Auth::user()->id;
        $employee = DB::table('users')->where('role_as' ,'!=', 0)->count();
        $customer = DB::table('customers')->count();
        $suppliers = DB::table('suppliers')->count();



        $OveralltotalSale = DB::table('tickets')->sum('salePrice');
        $OveralltotalPurchase = DB::table('tickets')->sum('purchsasePrice');
        $Overallprofit = DB::table('tickets')->sum('profit');

        
        $OveralltodaySale = DB::table('tickets')->whereDate('created_at', now())->sum('salePrice');
        $OveralltodayPurchase = DB::table('tickets')->whereDate('created_at', now())->sum('purchsasePrice');
        $OveralltodayProfit = DB::table('tickets')->whereDate('created_at', now())->sum('profit');





        $totalSale = DB::table('tickets')->where('userId' , $user_id)->sum('salePrice');
        $totalPurchase = DB::table('tickets')->where('userId' , $user_id)->sum('purchsasePrice');
        $profit = DB::table('tickets')->where('userId' , $user_id)->sum('profit');

        
        $todaySale = DB::table('tickets')->whereDate('created_at', now())->where('userId' , $user_id)->sum('salePrice');
        $todayPurchase = DB::table('tickets')->whereDate('created_at', now())->where('userId' , $user_id)->sum('purchsasePrice');
        $todayProfit = DB::table('tickets')->whereDate('created_at', now())->where('userId' , $user_id)->sum('profit');

        $totalExpense = DB::table('expenses')->sum('price');
        $todayExpense = DB::table('expenses')->whereDate('created_at', now())->sum('price');


       

        $data = DB::table('targets')->select('amount', 'achieveAmount')->where('month', date('Y-m'))->get();



        $totalPartial = DB::table('tickets')->where('paymentMethod' , 'Partial')->where('userId' , $user_id)->count();
        return view('dashboard.index',compact('employee','customer','suppliers','totalSale','totalPurchase','profit','todaySale','todayPurchase',
        'todayProfit','totalExpense','todayExpense','totalPartial','OveralltotalSale','OveralltotalPurchase','Overallprofit','OveralltodaySale','OveralltodayPurchase',
        'OveralltodayProfit','data'));
    }
}
