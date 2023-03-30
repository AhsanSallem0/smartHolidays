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

class PackageController extends Controller
{
    // page
    public function ticketPage(){
        return view('ticket.index');
    }

    // ticketAdd
    public function ticketAdd(){
        $customer = Customer::all();
        return view('ticket.add',compact('customer'));
    }



    public function checkEmailAvailability(Request $request)
    {
        $reference = $request->input('reference');

        $user = Customer::where('uniqueId', $reference)->first();

        if ($user) {
            return response(['success'=>'success']);
        }
        else{
            Customer::insert([
                'uniqueId' => $request->reference,
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'created_at' => Carbon::now(),
                
            ]);
            return response(['done'=>'done']);

        }
    }
}
