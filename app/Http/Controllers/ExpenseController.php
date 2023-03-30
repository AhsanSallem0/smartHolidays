<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;


class ExpenseController extends Controller
{
    //  expensePage
    public function expensePage(){
        return view('expense.index');
    }

    // yajra boc
    public function expenseData()
    {
        return Datatables::of(Expense::query()->orderBy('id','desc'))
        
        ->make(true);
    }



    // insert Expense
    public function insertExpense(Request $request){
    Expense::insert([
        'description' => $request->description,
        'price' => $request->price,
        'created_at' => Carbon::now(),
    ]);
    $notification = array(
        'message' => 'New expense has been added!',
        'alert_type' => 'success'
    );
    return Redirect()->back()->with($notification);
    }


    // edit page
    public function edit($id){
        $expense = Expense::find($id);
        return view("expense.edit",compact('expense'));
     
    }
     //update
     public function update(Request $request,$id){
        Expense::find($id)->update([
            'description' => $request->description,
            'price' => $request->price,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Expense has been updated!',
            'alert_type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }

    // delete
    public function delete($id){
        DB::table('expenses')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Expense has been remove!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
     

}
