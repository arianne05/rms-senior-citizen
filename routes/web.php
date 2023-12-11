<?php

use App\Http\Controllers\SeniorCitizenController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// CONTROLLER ROUTE FOR SENIOR CITIZEN
Route::controller(SeniorCitizenController::class)->group(function(){
    Route::get('/login','login')->name('login')->middleware('guest');
    Route::get('/add_citizen','add_citizen');
    Route::post('/process_add','process_add');

    Route::get('/edit_citizen/{id}','edit_citizen');
    Route::put('/process_edit/{id}','process_edit');

    Route::get('/delete_citizen/{id}','delete_citizen');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/','index')->middleware('auth');

    Route::get('/adduser','adduser');
    Route::post('/register','register');

    Route::get('/dashboard','dashboard')->middleware('auth');
    Route::post('/process_signin','process_signin');

    Route::get('/barangay','barangay')->middleware('auth');
    Route::get('/view_barangay/{barangay}','view_barangay')->middleware('auth');

    Route::post('/logout','logout');
});


