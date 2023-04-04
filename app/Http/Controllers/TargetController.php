<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Supplier;
use App\Models\Employee;
use App\Models\Target;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;

class TargetController extends Controller
{
    // index page
    public function targetPage(){
        return view('target.index');
    }

    // yajra box
    public function targetData()
    {
        return Datatables::of(Target::query()->orderBy('id','desc'))

            ->make(true);
    }
    
    // insert Expense
    public function insert(Request $request){
        Target::insert([
            'month' => $request->month,
            'amount' => $request->amount,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'New targer has been added!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
        }
    

}
