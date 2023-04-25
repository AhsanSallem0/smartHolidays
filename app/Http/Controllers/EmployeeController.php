<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Expense;
use App\Models\Supplier;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    public function employeePage(){
        return view('employee.index');
    }

    // yajra boc
    public function employeeData()
    {
        return Datatables::of(User::query()->where('role_as' ,'!=', 0)->orderBy('id','desc'))
        ->editColumn('status', function($status) {
            return view('employee.status', compact('status'));
        })
            ->make(true);
    }
    //insert data
    public function insert(Request $request){
        $random_img = 'img/random.jpg'; 
        $validateData = $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->firstname = $request->fullname;
        $user->address = $request->address;
        $user->profile = $random_img;
        $user->phone = $request->phone;
        $user->role_as = '1';
        $user->password = Hash::make($request->password);
        $user->date = date('Y-m-d');
        $user->save();

        // $employee = new Employee();
        // $employee->userId = $user->id;
        // $employee->fullname = $request->fullname;
        // $employee->email = $request->email;
        // $employee->password = $request->password;
        // $employee->phone = $request->phone;
        // $employee->address = $request->address;
        // $employee->save();



        $notification = array(
            'message' => 'New Employee has been added!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    //page edit
    public function edit($id){
        $employee = User::find($id);
        return view("employee.edit",compact('employee'));
    }



        //page detail
        public function detail($id){
            $month = date('Y-m'); 


            $employee = User::find($id);
            $sale = Ticket::where('userId',$id)->sum('salePrice');
            $purchase = Ticket::where('userId',$id)->sum('purchsasePrice');
            $profit = Ticket::where('userId',$id)->sum('profit');
            $recieve = Ticket::where('userId',$id)->sum('paymentRecieved');
            $remain = Ticket::where('userId',$id)->sum('paymentRemaining');


            // today
            $todaysale = Ticket::where('userId',$id)->whereDate('date', now())->sum('salePrice');
            $todaypurchase = Ticket::where('userId',$id)->whereDate('date', now())->sum('purchsasePrice');
            $todayprofit = Ticket::where('userId',$id)->sum('profit');
            $todayrecieve = Ticket::where('userId',$id)->whereDate('date', now())->sum('paymentRecieved');
            $todayremain = Ticket::where('userId',$id)->whereDate('date', now())->sum('paymentRemaining');
            // monthly
            $monthlysale = Ticket::where('userId',$id)->where('month', date('Y-m'))->sum('salePrice');
            $monthlypurchase = Ticket::where('userId',$id)->where('month', date('Y-m'))->sum('purchsasePrice');
            $monthlyprofit = Ticket::where('userId',$id)->where('month', date('Y-m'))->sum('profit');
            $monthlyrecieve = Ticket::where('userId',$id)->where('month', date('Y-m'))->sum('paymentRecieved');
            $monthlyremain = Ticket::where('userId',$id)->where('month', date('Y-m'))->sum('paymentRemaining');



            return view("employee.detail",compact('employee','sale','purchase','profit','recieve','remain',
            'todaysale','todaypurchase','todayprofit','todayrecieve','todayremain',
            'monthlysale','monthlypurchase','monthlyprofit','monthlyrecieve','monthlyremain','id',
            ));
        }

    //update
    public function update(Request $request,$id){
    

        User::where('id',$id)->update([
            'name' => $request->fullname,
            'firstname' => $request->fullname,
            'status' => $request->status,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ]);

        
        $notification = array(
            'message' => 'Employee data has been updated!',
            'alert_type' => 'warning'
        );
        return Redirect('/employee')->with($notification);
    }
    // delete
    public function delete($id){
        DB::table('users')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Employees has been remove!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

}
