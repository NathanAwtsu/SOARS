<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function(){
    return view('admin');
})->name('admin')->middleware('admin');

Route::get('/osaemp', function(){
    return view('osaemp');
})->name('osaemp')->middleware('osaemp');

Route::get('/studentleader', function(){
    return view('studentleader');
})->name('studentleader')->middleware('studentleader');

Route::get('/member', function(){
    return view('member');
})->name('member')->middleware('member');
