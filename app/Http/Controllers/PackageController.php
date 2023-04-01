<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\UniqueId;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Ticket;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    // page
    public function ticketPage(){
        return view('ticket.index');
    }

    // ticketAdd
    public function ticketAdd(){
        $prefix = 'SH';
        $number = str_pad(mt_rand(1, 9999), 2, '0', STR_PAD_LEFT);
        $uniqueId = $prefix . $number;



        $UniqueId = new UniqueId;
        $UniqueId->referenceNo = $uniqueId;
        $UniqueId->save();

        $referenceNo = $UniqueId->referenceNo;

        $customer = Customer::all();
        return view('ticket.add',compact('customer','referenceNo'));
    }

    // ticket insert
    public function ticketInsert(Request $request){
        $reference = $request->reference;
        $found = DB::table('customers')->where('uniqueId' , $reference)->first();
        if($found){
            Ticket::insert([
                'to' => $request->to,
                'from' => $request->from,
                'customerId' => $request->reference,
                'customerName' => $request->name,
                'customerEmail' => $request->email,
                'customerAddress' => $request->address,
                'customerPhone' => $request->phone,
                'passengerCount' => $request->passenger,
                'purchsasePrice' => $request->purchase,
                'salePrice' => $request->sale,
                'profit' => $request->profit,
                'paymentMethod' => $request->paymentMethod,
                'paymentRecieved' => $request->payRecieved,
                'paymentRemaining' => $request->remainingPayment,
                'created_at' => Carbon::now(),
            ]);
                $notification = array(
                    'message' => 'New ticket has been added!',
                    'alert_type' => 'success'
                );
                return Redirect()->back()->with($notification);
        }else{ 
            
            Customer::insert([
                'uniqueId' => $request->reference,
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'created_at' => Carbon::now(),
            ]);

            Ticket::insert([
                'to' => $request->to,
                'from' => $request->from,
                'customerId' => $request->reference,
                'customerName' => $request->name,
                'customerEmail' => $request->email,
                'customerAddress' => $request->address,
                'customerPhone' => $request->phone,
                'passengerCount' => $request->passenger,
                'purchsasePrice' => $request->purchase,
                'salePrice' => $request->sale,
                'profit' => $request->profit,
                'paymentMethod' => $request->paymentMethod,
                'paymentRecieved' => $request->payRecieved,
                'paymentRemaining' => $request->remainingPayment,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'New ticket has been added!',
                'alert_type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

        // program fetch data for fee
        public function fetchCustomer(Request $request){
            $data = Customer::where('uniqueId',$request->id)->first();
            return response($data);
        }
    


}
