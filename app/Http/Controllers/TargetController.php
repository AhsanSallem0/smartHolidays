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
            ->editColumn('status', function($status) {
                return view('target.status', compact('status'));
            })
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
            'message' => 'New target has been added!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
        }


        ///Edit Target
    public function edit($id){
        $target = Target::find($id);
        return view("target.edit",compact('target'));
    }
    // update
    public function update(Request $request,$id){
        // $achieve_amount = $request->achieve_amount;
        // $status = $request->status;


        Target::find($id)->update([
            'Amount' => $request->amount,
            'Month' => $request->month,

            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Target data has been updated!',
            'alert_type' => 'warning'
        );
        return Redirect('/target')->with($notification);
    }


}
