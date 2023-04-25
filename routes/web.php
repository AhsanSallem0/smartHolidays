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



use App\Http\Controllers\ReportController;



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
// yajra for partial
Route::get('/ticket/partial/data/{id}', [PackageController::class, 'ticketpartialData'])->name('partial.data');


// update ticket
Route::post('/ticket/update/{id}', [PackageController::class, 'update'])->name('update');



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
// employee/detail/
Route::get('employee/detail/{id}', [EmployeeController::class, 'detail'])->name('detail');

// yajra for tickrt page
Route::get('/ticket/get/employee/{id}',[PackageController::class, 'ticketDataEmployee'])->name('ticket.data.employee');
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
// employee/edit/
Route::get('/target/edit/{id}', [TargetController::class, 'edit']);
// /update/target
Route::post('/update/target/{id}', [TargetController::class, 'Update']);






//Report
Route::get('/report', [ReportController::class, 'reportpage']);
//today/report
Route::get('/today/report', [ReportController::class, 'todayreport']);
//month/report
Route::get('/month/report', [ReportController::class, 'monthreport']);
//today/report yajra
Route::get('/today/ticket/get',[ReportController::class, 'todayTicket'])->name('ticket.data.today');
//month/report yajra
Route::get('/month/ticket/get',[ReportController::class, 'monthTicket'])->name('ticket.data.month');
//search/report
Route::get('/search/report', [ReportController::class, 'searchreport']);
// /search/report/list
Route::get('/search/report/list', [ReportController::class, 'searchreportList']);










//overall/today/report
Route::get('/overall/today/report', [ReportController::class, 'overalltodayreport']);
//month/report/overall
Route::get('/overall/month/report', [ReportController::class, 'overallmonthreport']);
//today/report yajra/overall
Route::get('/overall/today/ticket/get',[ReportController::class, 'overalltodayTicket'])->name('ticket.data.today.overall');
//month/report yajra/overall
Route::get('/overall/month/ticket/get',[ReportController::class, 'overallmonthTicket'])->name('ticket.data.month.overall');
//search/report/overall
Route::get('/overall/search/report', [ReportController::class, 'overallsearchreport']);
// /search/report/list/overall
Route::get('/overall/search/report/list', [ReportController::class, 'overallsearchreportList']);














//today/expense
Route::get('/today/expense', [ReportController::class, 'todayexpense']);
//month/report
Route::get('/month/expense', [ReportController::class, 'monthexpense']);
//search/report
Route::get('/search/expense', [ReportController::class, 'searchexpense']);
//// yajra for expense today
Route::get('/expense/get/today',[ReportController::class, 'todayExpenseGet'])->name('expense.data.today');
//// yajra for expense month
Route::get('/expense/get/month',[ReportController::class, 'monthExpenseGet'])->name('expense.data.month');
// /search/expense/list
Route::get('/search/expense/list', [ReportController::class, 'searchexpenseList']);







// pdf routes
Route::get('/ticketPDF/{id}',[PDFController::class, 'ticketPDF'])->name('ticketPDF');
Route::get('/todayPdf',[PDFController::class, 'todayPdf'])->name('todayPdf');
Route::get('/monthPdf',[PDFController::class, 'monthPdf'])->name('monthPdf');
Route::get('/searchPDF',[PDFController::class, 'searchPDF'])->name('searchPDF');
Route::get('/todayExpensePdf',[PDFController::class, 'todayExpensePdf'])->name('todayExpensePdf');
Route::get('/monthExpensePdf',[PDFController::class, 'monthExpensePdf'])->name('monthExpensePdf');
Route::get('/searchExpensePDF',[PDFController::class, 'searchExpensePDF'])->name('searchExpensePDF');




Route::get('/overalltodayPdf',[PDFController::class, 'overalltodayPdf'])->name('overalltodayPdf');
Route::get('/overallmonthPdf',[PDFController::class, 'overallmonthPdf'])->name('overallmonthPdf');
Route::get('/overallsearchPDF',[PDFController::class, 'overallsearchPDF'])->name('overallsearchPDF');



Route::get('/ticketsPDF',[PDFController::class, 'ticketsPDF'])->name('ticketsPDF');
Route::get('/ticketDetailPdf/{id}',[PDFController::class, 'ticketDetailPdf'])->name('ticketDetailPdf');

Route::get('/customersPDF',[PDFController::class, 'customersPDF'])->name('customersPDF');
Route::get('/customerDetailPdf/{id}',[PDFController::class, 'customerDetailPdf'])->name('customerDetailPdf');
Route::get('/expensePDF',[PDFController::class, 'expensePDF'])->name('expensePDF');
Route::get('/expenseDetailPdf/{id}',[PDFController::class, 'expenseDetailPdf'])->name('expenseDetailPdf');
Route::get('/employeesPDF',[PDFController::class, 'employeesPDF'])->name('employeesPDF');
Route::get('/employeeDetailPdf/{id}',[PDFController::class, 'employeeDetailPdf'])->name('employeeDetailPdf');
Route::get('/employeesDataPDF/{id}',[PDFController::class, 'employeesDataPDF'])->name('employeesDataPDF');
























