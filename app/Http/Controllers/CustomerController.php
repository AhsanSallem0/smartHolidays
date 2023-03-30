<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;


class CustomerController extends Controller
{
    // page
    public function page(){
        return view('customer.index');
    }
    // yajra boc
    public function customerData()
    {
        return Datatables::of(Customer::query()->orderBy('id','desc'))
        
        ->make(true);
    }

    // insert
    public function insert(Request $request){
        Customer::insert([
            'uniqueId' => $request->reference,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'New customer has been added!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
     }

     // edit page
     public function edit($id){
        $customer = Customer::find($id);
        return view("customer.edit",compact('customer'));
     
    }
     //update
     public function update(Request $request,$id){
        Customer::find($id)->update([
            'uniqueId' => $request->reference,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Customer data has been updated!',
            'alert_type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }

    // delete
    public function delete($id){
        DB::table('customers')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Customer has been remove!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
     

}
