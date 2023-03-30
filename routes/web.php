<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PackageController;

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


// package page
Route::get('/ticket', [PackageController::class, 'ticketPage'])->name('ticket');
// /package/add
Route::get('/ticket/add', [PackageController::class, 'ticketAdd'])->name('ticket.add');


Route::post('/check-email-unique', [PackageController::class, 'checkEmailAvailability'])->name('check.email.unique');




