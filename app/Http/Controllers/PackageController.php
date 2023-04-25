<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\UniqueId;
use App\Models\User;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Ticket;
use App\Models\Partial_Payment;
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

    // yajra box
    public function ticketData()
    {
        $user_id = Auth::user()->id;
        return Datatables::of(Ticket::query()->where('userId' , $user_id)->orderBy('id','desc'))
        ->editColumn('paymentMethod', function($paymentMethod) {
            return view('ticket.paymentMethod', compact('paymentMethod'));
        })
        ->make(true);
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
        $user_id = Auth::user()->id;
        $customer = Customer::all();
        return view('ticket.add',compact('customer','referenceNo'));
    }

    // ticket insert
    public function ticketInsert(Request $request){
        $reference = $request->reference;
        $found = DB::table('customers')->where('uniqueId' , $reference)->first();
        $user_id = Auth::user()->id;
        if($found){

            $target = DB::table('targets')->where('month' ,date('Y-m') )->first();
            if($target == null){
                $notification = array(
                    'message' => 'This month target is not set yet!',
                    'alert_type' => 'warning'
                );
                return Redirect()->back()->with($notification);
            }
            else{
                $requestAmont = $request->sale;
                $amount = $target->achieveAmount;

                $previous = $target->amount;

                $total = $amount + $requestAmont;


                if($total >= $previous){
                    DB::table('targets')->where('month' , date('Y-m'))->update(array('achieveAmount' => $total , 'status' => 1));
                }else{
                    DB::table('targets')->where('month' , date('Y-m'))->update(array('achieveAmount' => $total));
                }



                
                
            



            Ticket::insert([
                'userId' => $user_id,
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
                'desc' => $request->desc,
                'date' => date('Y-m-d'),
                'month' => date('Y-m'),
                'created_at' => Carbon::now(),
            ]);

       
                $notification = array(
                    'message' => 'New ticket has been added!',
                    'alert_type' => 'success'
                );
                return Redirect('/ticket')->with($notification);
            }
        }else{

            $target = DB::table('targets')->where('month' ,date('Y-m') )->first();
            if($target == null){
                $notification = array(
                    'message' => 'This month target is not set yet!',
                    'alert_type' => 'warning'
                );
                return Redirect()->back()->with($notification);
            }
            else{
            $user_id = Auth::user()->id;
            Customer::insert([
                'userId' => $user_id,
                'uniqueId' => $request->reference,
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'date' => date('Y-m-d'),
                'created_at' => Carbon::now(),
            ]);

            Ticket::insert([
                'userId' => $user_id,
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
                'desc' => $request->desc,
                'date' => date('Y-m-d'),
                'month' => date('Y-m'),
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'New ticket has been added!',
                'alert_type' => 'success'
            );
            return Redirect('/ticket')->with($notification);
            }
        }
    }

        // program fetch data for fee
        public function fetchCustomer(Request $request){
            $id = $request->id;
            if($id != null){
                $record = Customer::where('uniqueId',$request->id)->first();
                return response(['success' => 'success',  'record' => $record]);


            }else{
                $prefix = 'SH';
                $number = str_pad(mt_rand(1, 9999), 2, '0', STR_PAD_LEFT);
                $uniqueId = $prefix . $number;
                return response(['error' => 'error',  'uniqueId' => $uniqueId]);

        
    
            }
        }
        //Ticket Detail
            public function ticketdetail($id){
                $ticket = Ticket::find($id);
                return view("ticket.detail",compact('ticket'));
            }
            //ticketpartial
        public function ticketpartial($id){
            $partial = Ticket::find($id);
            return view("ticket.partial",compact('partial'));
        }
        //partialrec
        public function partialrec($id , Request $request){
          $recieved = $request->received;
          $data = Ticket::where('id' , $id)->first();
          $paymentRemaining = $data->paymentRemaining;
         


          $paymentRecieved = $data->paymentRecieved;
          $total = $paymentRecieved + $recieved;

          $sale = $data->salePrice;
                if($total > $sale){
                    $notification = array(
                        'message' => 'Recieved amount is greater then sale!',
                        'alert_type' => 'warning'
                    );
                    return Redirect()->back()->with($notification);
                }
                else{
                   if($total == $sale){
                        $recived = $paymentRemaining - $recieved;

                        Ticket::where('id', $id)
                            ->update([
                                'paymentMethod' => 'Complete',
                                'paymentRemaining' => $recived,
                                'paymentRecieved' => $total,
                            ]);

                            Partial_Payment::insert([
                                'ticket_id' => $id,
                                'payment' => $recieved,
                                'date' => date('Y-m-d'),
                                'created_at' => Carbon::now(),
                            ]);

            
                        $notification = array(
                            'message' => 'Payment has been recieved!',
                            'alert_type' => 'success'
                        );
                    return Redirect()->back()->with($notification);
                   }else{
                        $recived = $paymentRemaining - $recieved;

                        Ticket::where('id', $id)
                            ->update([
                                'paymentRemaining' => $recived,
                                'date' => date('Y-m-d'),
                                'paymentRecieved' => $total,
                            ]);

                            Partial_Payment::insert([
                                'ticket_id' => $id,
                                'payment' => $recieved,
                                'date' => date('Y-m-d'),
                                'created_at' => Carbon::now(),
                            ]);
            
                        $notification = array(
                            'message' => 'Payment has been recieved!',
                            'alert_type' => 'success'
                        );
                    return Redirect()->back()->with($notification);
                   }
                }
        }

    
    
    
            //update
        public function update(Request $request,$id){
            Ticket::find($id)->update([
                'to' => $request->to,
                'from' => $request->from,
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
                'desc' => $request->desc,
                'updated_at' => Carbon::now(),
            ]);
            $reference = $request->reference;

            Customer::where('uniqueId',$reference)->update([
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'updated_at' => Carbon::now(),
            ]);


            $notification = array(
                'message' => 'Ticekt has been updated!',
                'alert_type' => 'success'
            );
            return Redirect('/ticket')->with($notification);
        }


         // yajra box ticketpartialData
    public function ticketpartialData($id)
    {
        return Datatables::of(Partial_Payment::query()->where('ticket_id' , $id)->orderBy('id','desc'))
        ->make(true);
    }



    public function ticketDataEmployee($id)
    {
        return Datatables::of(Ticket::query()->where('userId' , $id)->orderBy('id','desc'))
        ->editColumn('paymentMethod', function($paymentMethod) {
            return view('employee.paymentMethod', compact('paymentMethod'));
        })
        ->make(true);
    }

}


       