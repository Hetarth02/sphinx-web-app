<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\DisplayController;

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

//Returns views
Route::get('/', function () {return view('login');});
Route::get('registration', function () {return view('registration');});
Route::get('about', function () {return view('about');});
Route::get('credits', function () {return view('credits');});

//Functionality
Route::get('logout', [UserController::class, 'logout']);
Route::get('profile', [UserController::class, 'displayuserdata']);
Route::get('home', [DisplayController::class, 'display']);
Route::get('/user/{username}', [DisplayController::class, 'fetchuserprofile']);
Route::get('displayquestion/{qid}', [DisplayController::class, 'displayquestion']);
Route::post('auth', [UserController::class, 'checkuserdetails']);
Route::post('register', [UserController::class, 'adduserdetails']);
Route::post('qsub', [QAController::class, 'qsub']);
Route::post('asub/{qid}', [QAController::class, 'asub']);
//Route::get('forgotpassword', [UserController::class, 'forgotpassword']);
