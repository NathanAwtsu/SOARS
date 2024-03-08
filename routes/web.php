<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentOrganizationController;
use App\Http\Controllers\OsaController;
use App\Http\Controllers\OsaEmpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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






Route::get('/', function () {return view('soars');});
Route::get('/soars', [LoginController::class, 'store'], [LoginController::class, 'create'],function () {return view('soars');});
Route::get('/soars/store', [LoginController::class], 'store');
Route::get('/', function () {return view('soars');});
//reCAPTCHA

Route::get('/soar/session_expired', function () {return view('session_expired');});
Auth::routes();

//Static RSO Pages


//CourseController

//Admin
Route::middleware(['admin'])->group(function () {
    
Route::get('/admin', [StudentsController::class, 'showDashboard'])->name('admin');




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
Route::get('/osaemp/organizaiton/{id}',function($id){$orgID = DB::table('organizations')->where('id','=',$id)->get();
});

//Routes for OSA
//Load the Dashboard Total Number 
Route::get('/osaemp', [OsaController::class, 'totalDashboard'], function(){return view('osaemp');})->name('osaemp')->middleware('osaemp');
//Calendar of activities dashboard
Route::get('/osaemp/dash', [OsaController::class, 'getEvents'])->name('osa.fullcalendar');
Route::post('/osaemp/fullcalendar/activity', [OsaController::class, 'calendarAjax']);
Route::get('/osaemp/dashboard', [OsaController::class, 'totalDashboard'])->name('osadashboard');
Route::get('/osaemp/activities', [OsaController::class, 'dashboard_Activities'], function(){return view('OSA/activity');})->name('osaactivity');
Route::get('/osaemp/organization_activation', [OsaController::class, 'org_act_list'], function(){return view('OSA/organization_activation');})->name('osaorgact');
Route::delete('/osaemp/organization_list/delete/{id}', [OrganizationController::class, 'org_pending_delete']);
Route::get('/osaemp/user', [UserController::class, 'info'],function (){return view('OSA.user');})->name('osauser');
Route::get('/osaemp/users', [UserController::class, 'index'])->name('user.index');
Route::post('/osaemp/users/update', [UserController::class, 'update'])->name('user.update');


Route::get('/osaemp/userlist', [OsaController::class,'user'], function (){return view('OSA/userlist');})->name('osauserlist');
Route::get('/osaemp/message', function (){return view('OSA/message');})->name('osamessage');

//Load the List of Organization
Route::get('/osaemp/organization_list', [OrganizationController::class, 'organization'], function(){return view('OSA/organization_list');})->name('osaorganizationlist');
Route::get('/osaemp/organization_list/organization_page/{id}', [OrganizationController::class, 'organization_page']);
Route::get('/osaemp/organization_list/organization_edit/{id}', [OrganizationController::class, 'org_pending_edit_view']);
Route::get('/osaemp/organization_list/new_organization',  function(){return view('OSA/organization_new');})->name('osaorganization_new');
Route::get('/osaemp/organization_list/pending_edit/{id}', [OrganizationController::class, 'org_pending_edit_view'], function(){return view('OSA/organization_pending_edit');})->name('osaorganization_pending_edit_view');
Route::post('/osaemp/organization_list/pending_edit_save/{id}', [OrganizationController::class, 'org_pending_edit_save']);
//Send a New Org info to the DB
Route::post('/osaemp/organization_list/new_organization', [OrganizationController::class, 'newOrganization']);

//OrganizationPages

//Insert all the Info for Activity Approval
Route::post('/osaemp/activity_approval', [OsaController::class, 'store']);
Route::post('/osaemp/activity_approval/event_approve_or_edit', [OsaController::class, 'event_Approve_or_edit']);
Route::get('/osaemp/activity_approval/edit_pending_activity/{id}', [OsaController::class, 'edit_pending_activity'])->name('edit_pending_activity');
Route::post('/osaemp/activity_approval/edit_save/{id}', [OsaController::class, 'edit_save_pending_activity']);


//Retrieve the list of Activity to be Approved
Route::get('/osaemp/activity_approval', [OsaController::class, 'activity_pending_retrieve'],function(){return view('OSA/approval');})->name('osaactivityapproval');


Route::get('/osaemp/reports', [OsaController::class, 'eventReport'], function(){ return view('OSA/reports');})->name('osareports');




//End of Routes for OSA


//Routes for Student Leader

Route::get('/studentleader', [StudentOrganizationController::class, 'totalDashboard'], function(){return view('SL.dashboard');})->name('studentleader')->middleware('studentleader');
Route::get('/studentleader/user/{id}', [StudentOrganizationController::class, ''], function(){return view('SL.user');});

Route::get('/member', function(){return view('member');})->name('member')->middleware('member');

//Login Timeout
Route::get('/soars-timeout?timeout=true');

//Credential Errors
Route::get('error', function(){return view('error');});

//Forgot Password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
