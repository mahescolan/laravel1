<?php

use App\Http\Controllers\employeeinsertcontroller;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

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
Route::get('user/register',[employeeinsertcontroller::class,'register'])->name('user.register');
Route::post('user/register',[employeeinsertcontroller::class,'regstore'])->name('user.regstore');
Route::get('user/login',[employeeinsertcontroller::class,'login'])->name('user.login');
Route::post('user/Login_in',[employeeinsertcontroller::class,'Login_in'])->name('user.Login_in');
Route::get('user/logout', [employeeinsertcontroller::class, 'logout'])->name('user.logout');

Route::middleware('auth')->group(function(){

Route::get('employee_list',[employeeinsertcontroller::class,'emp_details'])->name('emp_details');
Route::get('index',[employeeinsertcontroller::class,'index'])->name('index');
Route::get('user/create',[employeeinsertcontroller::class,'create'])->name('user.create');
Route::post('store',[employeeinsertcontroller::class,'store'])->name('store');
Route::get('user/show/{id}',[employeeinsertcontroller::class,'show'])->name('user.show');
Route::get('user/edit/{id}',[employeeinsertcontroller::class,'edit'])->name('user.edit');
Route::put('user/update/{id}',[employeeinsertcontroller::class,'update'])->name('user.update');
Route::delete('user/destroy/{id}',[employeeinsertcontroller::class,'destroy'])->name('user.destroy');
Route::get('user/addemp',[employeeinsertcontroller::class,'addemp'])->name('user.addemp');
Route::post('user/create',[employeeinsertcontroller::class,'add'])->name('user.add');
Route::get('user/adddocument',[employeeinsertcontroller::class,'adddocument'])->name('user.adddocument');
Route::post('user/create',[employeeinsertcontroller::class,'docustore'])->name('user.docustore');
Route::get('user/dcshow/{id}',[employeeinsertcontroller::class,'dcshow'])->name('user.dcshow');

});




