<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentsController;


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

Route::get('/', function () {return view('soars');});
Route::get('/soars', function () {return view('soars');});

Auth::routes();

//Static RSO Pages
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::middleware(['admin'])->group(function () {
    
Route::get('/admin', function(){return view('Admin.admin');})->name('admin');
Route::get('/course-list', [CoursesController::class, 'courselist'])->name('courselist');
Route::post('stores', [CoursesController::class, 'stores']);
Route::post('edits', [CoursesController::class, 'edit']);
Route::post('deletes', [CoursesController::class, 'delete']);
Route::get('/student-list', [StudentsController::class, 'studlist'])->name('studlist');
Route::post('store', [StudentsController::class, 'store']);
Route::post('edit', [StudentsController::class, 'edit']);
Route::post('delete', [StudentController::class, 'delete']);
});
Route::get('/audit-log', function () {return view('Admin.audit_log');})->name('audit_log');
//End of Admin

//Routes for OSA
Route::get('/osaemp', function(){return view('osaemp');})->name('osaemp')->middleware('osaemp');
Route::get('/osaemp/dashboard', function (){return view('OSA/dashboard');});

//End of Routes for OSA

Route::get('/studentleader', function(){return view('studentleader');})->name('studentleader')->middleware('studentleader');

Route::get('/member', function(){return view('member');})->name('member')->middleware('member');

Route::get('/authentication_error', function (){return view('authentication_error');});
//Login Timeout
Route::get('/soars-timeout?timeout=true');

//Credential Errors
Route::get('error', function(){return view('error');});
