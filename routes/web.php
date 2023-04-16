<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\PDFController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// profile page
Route::get('/profile/page', [ProfileController::class, 'profilePage']);
// update 1 profile page
Route::post('/admin/profile/update/{id}', [ProfileController::class, 'update1']);
Route::post('/admin/profile/update2/{id}', [ProfileController::class, 'update2']);




// vustomer page
Route::get('/customer', [CustomerController::class, 'page'])->name('customer');
// customer data insert
Route::post('/insert/customer', [CustomerController::class, 'insert']);
//// yajra for customer
Route::get('/customer/get',[CustomerController::class, 'customerData'])->name('customer.data');
// customer edit page
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
// update customer
Route::post('/update/customer/{id}', [CustomerController::class, 'update']);
// delete customer
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('delete');



// expense page
Route::get('/expense', [ExpenseController::class, 'expensePage'])->name('expense');
// expense data insert
Route::post('/insert/expense', [ExpenseController::class, 'insertExpense']);
//// yajra for expense
Route::get('/expense/get',[ExpenseController::class, 'expenseData'])->name('expense.data');
// expense edit page
Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('edit');
// update expense
Route::post('/update/expense/{id}', [ExpenseController::class, 'update']);
// delete expense
Route::get('/expense/delete/{id}', [ExpenseController::class, 'delete'])->name('delete');


// ticket page
Route::get('/ticket', [PackageController::class, 'ticketPage'])->name('ticket');
// /ticket/add
Route::get('/ticket/add', [PackageController::class, 'ticketAdd'])->name('ticket.add');
// insert new ticket
Route::post('/ticket/insert', [PackageController::class, 'ticketInsert'])->name('ticket.insert');
// fetch customer data in ticket
Route::get('/customer/fetch/data', [PackageController::class, 'fetchCustomer'])->name('fetchCustomer');
// yajra for tickrt page
Route::get('/ticket/get',[PackageController::class, 'ticketData'])->name('ticket.data');
// ticket detail
Route::get('/ticket/detail/{id}', [PackageController::class, 'ticketdetail'])->name('ticketdetail');
// ticket partials
Route::get('/ticket/partial/{id}', [PackageController::class, 'ticketpartial'])->name('ticketpartial');
// partials payment Recived
Route::post('update/partial/{id}', [PackageController::class, 'partialrec'])->name('partialrec');


// suppllier
Route::get('/supplier', [SupplierController::class, 'supplierPage'])->name('supplier');
//// yajra for supplier
Route::get('/supplier/get',[SupplierController::class, 'supplierData'])->name('supplier.data');
// /insert/supplier
Route::post('/insert/supplier', [SupplierController::class, 'insert']);
// supplier/edit/
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('edit');
// update supplier
Route::post('/update/supplier/{id}', [SupplierController::class, 'update']);
// supplier delete
Route::get('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('delete');

//employee
Route::get('/employee', [EmployeeController::class, 'employeePage'])->name('employee');
//// yajra for supplier
Route::get('/employee/get',[EmployeeController::class, 'employeeData'])->name('employee.data');
// /insert/employee
Route::post('/insert/employee', [EmployeeController::class, 'insert']);
// employee/edit/
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
// update employee
Route::post('/update/employee/{id}', [EmployeeController::class, 'update']);
// employee delete
Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

//target
Route::get('/target', [TargetController::class, 'targetPage'])->name('target');
//// yajra for target
Route::get('/target/get',[TargetController::class, 'targetData'])->name('target.data');
// /insert/target
Route::post('/insert/target', [TargetController::class, 'insert']);



// pdf routes
Route::get('/ticketPDF/{id}',[PDFController::class, 'ticketPDF'])->name('ticketPDF');







