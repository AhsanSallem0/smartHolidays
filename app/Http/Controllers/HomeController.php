<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $employee = DB::table('employees')->count();
        $customer = DB::table('customers')->count();
        $suppliers = DB::table('suppliers')->count();
        $totalSale = DB::table('tickets')->sum('salePrice');
        $totalPurchase = DB::table('tickets')->sum('purchsasePrice');
        $profit = DB::table('tickets')->sum('profit');

        
        $todaySale = DB::table('tickets')->whereDate('created_at', now())->sum('salePrice');
        $todayPurchase = DB::table('tickets')->whereDate('created_at', now())->sum('purchsasePrice');
        $todayProfit = DB::table('tickets')->whereDate('created_at', now())->sum('profit');

        $totalExpense = DB::table('expenses')->sum('price');
        $todayExpense = DB::table('expenses')->whereDate('created_at', now())->sum('price');

        $totalPartial = DB::table('tickets')->where('paymentMethod' , 'Partial')->count();
        return view('dashboard.index',compact('employee','customer','suppliers','totalSale','totalPurchase','profit','todaySale','todayPurchase',
        'todayProfit','totalExpense','todayExpense','totalPartial'));
    }
}
