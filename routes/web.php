<?php

use App\Http\Controllers\SeniorCitizenController;
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
    Route::get('/','index');
});