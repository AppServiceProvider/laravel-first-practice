<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth::routes(['register'=> false]);


// The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
// The Email Verification Handler 



Route::get('/deposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('deposite.money')->middleware('verified');

// The Email Verification Notice 
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
// The Email Verification Notice 



Route::get('/resend-email', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend')->middleware('verified');




Route::get('/class', [App\Http\Controllers\Admin\ClassController::class, 'index'])->name('class.index')->middleware('verified');


Route::get('/class/create', [App\Http\Controllers\Admin\ClassController::class, 'createController'])->name('create')->middleware('verified');

Route::post('/class/store', [App\Http\Controllers\Admin\ClassController::class, 'storeController'])->name('store.class')->middleware('verified');

// delete 
Route::get('/class/delete/{id}', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('classDelete');
// delete 
// Route::get('/class/edit/{id}', [App\Http\Controllers\Admin\ClassController::class, 'editController'])->name('edit');
// Route::get('/class/update/{id}', [App\Http\Controllers\Admin\ClassController::class, 'updateController'])->name('update');
Route::resource('students',App\Http\Controllers\Admin\StudentController::class);
