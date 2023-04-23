<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\UniqueId;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;


class CustomerController extends Controller
{
    // page
    public function page(){


        $prefix = 'SH';
        $number = str_pad(mt_rand(1, 9999), 2, '0', STR_PAD_LEFT);
        $uniqueId = $prefix . $number;



        $UniqueId = new UniqueId;
        $UniqueId->referenceNo = $uniqueId;
        $UniqueId->save();

        $referenceNo = $UniqueId->referenceNo;

        
        return view('customer.index',compact('referenceNo'));
    }
    // yajra boc
    public function customerData()
    {
        
        $user_id = Auth::user()->id;
        return Datatables::of(Customer::query()->where('userId' , $user_id)->orderBy('id','desc'))
        
        ->make(true);
    }

    // insert
    public function insert(Request $request){
        $user_id = Auth::user()->id;
        Customer::insert([
            'userId' => $user_id,
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
