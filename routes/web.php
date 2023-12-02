<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentOrganizationController;
use App\Http\Controllers\OsaController;
use App\Http\Controllers\OsaEmpController;
use App\Models\Event;


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
/*
Route::get('user/{id}', function($id){
	$userIdQuery = DB::select('SELECT id, name, email, created_at, updated_at FROM users WHERE id = ?' , [$id]);

	if($userIdQuery != null)
	{
	
		$tempArray;
		$userIdQueryObj = array();
		foreach($userIdQuery as $value)
		{
			$tempArray = array(
				"id" => $value->id, 
				"name" => $value->name,
				"email" => $value->email,
				"createdAt" => $value->created_at,
				"updatedAt" => $value->updated_at
		);
		//array_push($userIdQueryObj, $tempArray);

	}
	$objectUserQuery = (object)[
		"data" => $userIdQueryObj
	];
	return response()->json($tempArray);
	}
	else
	{
		return response()->json([
			"message" => "User ID not found"
		],404);
	}
});
*/



Route::get('/', function () {return view('soars');});
Route::get('/soars', function () {return view('soars');});
Route::get('/soars', [UserController::class, 'create']);
//reCAPTCHA

Route::get('/soar/session_expired', function () {return view('session_expired');});
Auth::routes();

//Static RSO Pages


//CourseController

//Admin
Route::middleware(['admin'])->group(function () {
    
Route::get('/admin', function(){return view('Admin.admin');})->name('admin');


//StudentController
Route::get('/student-list', [StudentsController::class, 'studlist'])->name('studlist');
Route::post('store', [StudentsController::class, 'store']);
Route::post('edit', [StudentsController::class, 'edit']);
Route::post('delete', [StudentsController::class, 'delete']);

//OsaEmpController
Route::get('osa_list', [OsaEmpController::class, 'osalist'])->name('osalist');
Route::post('stores', [OsaEmpController::class, 'stores']);
Route::post('edits', [OsaEmpController::class, 'edits']);
Route::post('deletes', [OsaEmpController::class, 'deletes']);
});
Route::get('/audit_log', function () {return view('Admin.audit_log');})->name('auditlog');
Route::get('/rso_list', [StudentOrganizationController::class, 'showRSOlist'])->name('rso_list');
Route::get('/rso_detail', [StudentOrganizationController::class, 'showRSODetail'])->name('rso_detail');
Route::get('/admin_profile', function(){return view('Admin.admin_profile');})->name('admin_profile');

//End of Admin

//OrganizationController
Route::get('/osaemp/organizations-list', [OrganizationController::class, 'orglist'])->name('orglist');

//Routes for OSA
//Load the Dashboard Total Number 
Route::get('/osaemp', [OsaController::class, 'totalDashboard'], function(){return view('osaemp');})->name('osaemp')->middleware('osaemp');
Route::get('/osaemp/dashboard',[OsaController::class, 'totalDashboard'], function (){return view('OSA/dashboard'); })->name('osadashboard');
Route::get('/osaemp/user', function (){return view('OSA/user');})->name('osauser');
Route::get('/osaemp/userlist', function (){return view('OSA/userlist');})->name('osauserlist');
Route::get('/osaemp/message', function (){return view('OSA/message');})->name('osamessage');
//Load the List of Organization
Route::get('/osaemp/organization_list', [OsaController::class, 'organization'], function(){return view('OSA/organization_list');})->name('osaorganizationlist');
Route::get('/osaemp/organization_list/new_organization',  function(){return view('OSA/organization_new');})->name('osaorganization_new');

//Send a New Org info to the DB
Route::post('/osaemp/organization_list/new_organization', [OsaController::class, 'newOrganization']);

//Insert all the Info
Route::post('/osaemp/activity_approval', [OsaController::class, 'store']);
//Retrieve the list of Activity to be Approved
Route::get('/osaemp/activity_approval', [OsaController::class, 'retrieve'],function(){return view('OSA/approval');})->name('osaactivityapproval');

Route::get('/osaemp/reports', function(){ return view('OSA/reports');})->name('osareports');



//End of Routes for OSA



Route::get('/studentleader', function(){return view('studentleader');})->name('studentleader')->middleware('studentleader');

Route::get('/member', function(){return view('member');})->name('member')->middleware('member');

//Login Timeout
Route::get('/soars-timeout?timeout=true');

//Credential Errors
Route::get('error', function(){return view('error');});