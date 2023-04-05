<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
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
        return view('report.today');
    }

}
