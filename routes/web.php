<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
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
Route::get('/soar/session_expired', function () {return view('session_expired');});
Auth::routes();

//Static RSO Pages


//CourseController
Route::get('/admin', function(){return view('admin');})->name('admin')->middleware('admin');
//Admin
Route::middleware(['admin'])->group(function () {
    
Route::get('/admin', function(){return view('Admin.admin');})->name('admin');
Route::get('/course-list', [CoursesController::class, 'courselist'])->name('courselist');
Route::post('stores', [CoursesController::class, 'stores']);
Route::post('edits', [CoursesController::class, 'edit']);
Route::post('deletes', [CoursesController::class, 'delete']);

//StudentController
Route::get('/student-list', [StudentsController::class, 'studlist'])->name('studlist');
Route::post('store', [StudentsController::class, 'store']);
Route::post('edit', [StudentsController::class, 'edit']);
Route::post('delete', [StudentsController::class, 'delete']);
});
Route::get('/audit_log', function () {return view('Admin.audit_log');})->name('audit_log');
Route::get('/rso_list', function () {return view('student_orgs.rso_list');})->name('rso_list');
Route::get('/rso_detail', function () { $content = request()->query('content'); return view('student_orgs.rso_detail', compact('content'));})->name('rso_detail');
Route::post('/upload_logo', [StudentOrganizationController::class, 'uploadLogo'])->name('upload_logo');
//End of Admin

//OrganizationController
Route::get('/osaemp/organizations-list', [OrganizationController::class, 'orglist'])->name('orglist');

//Routes for OSA
Route::get('/osaemp', function(){return view('osaemp');})->name('osaemp')->middleware('osaemp');
Route::get('/osaemp/dashboard', function (){return view('OSA/dashboard');})->name('osadashboard');
Route::get('/osaemp/user', function (){return view('OSA/user');})->name('osauser');
Route::get('/osaemp/userlist', function (){return view('OSA/userlist');})->name('osauserlist');
Route::get('/osaemp/message', function (){return view('OSA/message');})->name('osamessage');
Route::get('/osaemp/updateunseenmessage', [App\Http\Controllers\OsaController::class, 'checkUnseenMessage']);
Route::get('/osaemp/organization_list', function(){return view('OSA/organization_list');})->name('osaorganizationlist');
Route::get('/osaemp/organization_list/new_organization', function(){return view('OSA/organization_new');})->name('osaorganization_new');


//End of Routes for OSA

Route::get('/studentleader', function(){return view('studentleader');})->name('studentleader')->middleware('studentleader');

Route::get('/member', function(){return view('member');})->name('member')->middleware('member');

//Login Timeout
Route::get('/soars-timeout?timeout=true');

//Credential Errors
Route::get('error', function(){return view('error');});