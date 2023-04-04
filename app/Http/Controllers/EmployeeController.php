<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use App\Models\Customer;
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
        return Datatables::of(Employee::query()->orderBy('id','desc'))
        ->editColumn('status', function($status) {
            return view('employee.status', compact('status'));
        })
            ->make(true);
    }
    //insert data
    public function insert(Request $request){

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->role_as = '1';
        $user->password = Hash::make($request->password);
        $user->save();

        $employee = new Employee();
        $employee->userId = $user->id;
        $employee->fullname = $request->fullname;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->save();



        $notification = array(
            'message' => 'New Employee has been added!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    //page edit
    public function edit($id){
        $employee = Employee::find($id);
        return view("employee.edit",compact('employee'));
    }
    //update
    public function update(Request $request,$id){
    
        User::where('id',$id)->update([
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        Employee::where('userId',$id)->update([
            'fullname' => $request->fullname,
            'status' => $request->status,
            'password' => $request->password,
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
        DB::table('employees')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Employees has been remove!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

}
