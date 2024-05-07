<?php

use App\Http\Controllers\UserformController;
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


Route::get('/', [UserformController::class,'welcome']);

//Route::get('fetchData', [UserformController::class,'fetchData']);
Route::post('filter', [UserformController::class,'filter']);
Route::get('search', [UserformController::class,'search']);
Route::get('income', [UserformController::class,'incomepage']);
Route::get('totalincome', [UserformController::class,'totalincome']);
Route::get('totalexpense', [UserformController::class,'totalexpense']);
Route::get('expense', [UserformController::class,'expensepage']);
Route::get('lastincome', [UserformController::class,'lastincome']);
Route::get('last5income', [UserformController::class,'recentIncome']);
Route::get('lastexpense', [UserformController::class,'lastexpense']);
