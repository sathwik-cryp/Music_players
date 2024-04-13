<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\admincontrol;
use App\Http\Controllers\Quizcontroller;
use App\Http\Controllers\userManagecontroller;
use App\Http\Controllers\userlogin;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\paginatecontroller;
use App\Http\Controllers\taskcontroller;

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
// Route::get('/userinstruct', function () {
//   return view('userinstruct');
// })->middleware('user');

Route::get('/userinstruct',[userlogin::class,"loginstart"])->middleware('user');

Route::get('/', function () {
  return view('welcome');
});

Route::get('/next-page', function () {
  
  
  return view('testend');
});

Route::post('/next-page',[homecontroller::class,"sendMessagesToAdmin"])->middleware('user');


Route::get('/get-paginated-data',[paginatecontroller::class,"getPaginatedData"]);


Route::get("/home",[homecontroller::class,"index"])->middleware('user');
Route::post("/home",[homecontroller::class,"submitAnswers"]);



Route::get("/adminresultview",[admincontrol::class,"userMessage"])->middleware('admin');
Route::get("/taskview",[taskcontroller::class,"showTasks"])->middleware('admin');

Route::get("/admindash",[admincontrol::class,"adminview"])->middleware('admin');

Route::GET("/delu/{id}",[userManagecontroller::class,"deleteuser"])->middleware('admin');

Route::GET("/dele/{id}",[taskcontroller::class,"deletetask"]);

Route::GET("/del/{id}",[Quizcontroller::class,"delete"])->middleware('admin');
Route::GET("/update/{id}",[Quizcontroller::class,"updateview"])->middleware('admin');
Route::POST("/update/{id}",[Quizcontroller::class,"update"]);

Route::get("/login",[userlogin::class,"loginview"]);
Route::post("/login",[userlogin::class,"login"]);

Route::get("/userlist",[userManagecontroller::class,"userview"])->middleware('admin');

Route::get("/userdash",[userManagecontroller::class,"showCreateForm"])->middleware('admin');
Route::post("/userdash",[userManagecontroller::class,"createUser"]);

Route::post("/adtask",[taskcontroller::class,"addToTask"]);
Route::get('/adtask',[taskcontroller::class,"taskview"])->middleware('admin');




Route::get("/quiz",[Quizcontroller::class,"create"])->middleware('admin');
Route::post("/quiz",[Quizcontroller::class,"store"]);

Route::get('/taskmanage', function () {
    return view('adTaskmanagement');
})->middleware('admin');

Route::get("/admin",function(){
    if(session()->has('adminId'))return redirect("/taskmanage");
     return view("/adminlog");
  });

  Route::get("/adminlogout",function(){
    if(session()->has('adminId'))session()->pull('adminId',null);
    return redirect("/admin");
  });

  // Route::get("/adminlogout",[homecontroller::class,"store"]);
  Route::post("/admin",[admincontrol::class,"login"]);

  Route::get("/logout",[homecontroller::class,"someLogoutFunction"]);











  Route::post('/clear-session', function () {

    
    if(session()->has('loginId'))session()->pull('loginId',null);

    // Clear the desired session variable
  

    return response()->json(['message' => 'Session cleared successfully']);
});



 