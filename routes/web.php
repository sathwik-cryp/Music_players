<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userRegistrationcontroller;
use App\Http\Controllers\userlogin;
use App\Http\Controllers\AccountController;

use App\User;
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
})->name('home');


Route::get('/login',[userlogin::class, 'login'])->name('login');

Route::post('/login',[userlogin::class, 'loginpost'])->name('login.post');


Route::get('/registration',[userRegistrationcontroller::class,'registration'])->name('registration');
Route::post('/registration',[userRegistrationcontroller::class, 'registrationpost'])->name('registration.post');

Route::get('/dashboard',[listandformmanager::class,'userdashboard'])->name('dashboard');

Route::get('reset_password_without_token', [AccountController::class,'validatePasswordRequest']);
Route::post('reset_password_with_token', [AccountController::class,'resetPassword']);