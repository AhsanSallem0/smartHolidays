<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;
class SupplierController extends Controller
{
    //  supplierPage
    public function supplierPage(){
        return view('supplier.index');
    }

    // yajra boc
    public function supplierData()
    {
        return Datatables::of(Supplier::query()->orderBy('id','desc'))
        
        ->make(true);
    }
    //insert data
    public function insert(Request $request){
        Supplier::insert([
            
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'New Supplier has been added!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
     }
     //page edit
     public function edit($id){
        $supplier = Supplier::find($id);
        return view("supplier.edit",compact('supplier'));
     }
      //update
      public function update(Request $request,$id){
        Supplier::find($id)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Supplier data has been updated!',
            'alert_type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }
     // delete
     public function delete($id){
        DB::table('suppliers')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Supplier has been remove!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

}
