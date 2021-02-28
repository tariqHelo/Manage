<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\WaterMarkController;


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
    return view('auth.login');
});
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' => ['auth']], function () {
    
    Route::resource('roles',    RoleController::class);
    Route::resource('users',    UserController::class);


    Route::resource('/students',    StudentController::class);

    Route::resource('/students',    StudentController::class);


    Route::get('/test1', [TestController::class,'create'])->name('temp-create');
    Route::get('/test', [TestController::class,'index'])->name('temp-main');



    Route::get('/students', [StudentController::class,'index'])->name('students');
    Route::get('/add_student', [StudentController::class,'create'])->name('add_student');


    Route::post('/makeimage', [TestController::class,'makeimage'])->name('store_temp');
    Route::post('/printimage', [TestController::class,'printimage'])->name('print-image');


    Route::get("/change-password", [ AdminController::class,'changePassword'])->name("change-password");
    Route::put("/change-password", [ AdminController::class,'postChangePassword'])->name("post-change-password");

    Route::post("/receve" , [StudentController::class , 'receve'])->name("receve"); 
    Route::post("/SMS" , [StudentController::class , 'SMS'])->name("SMS");    
   
});

Route::get('download-file/{id}' , function($id){
    $file = \App\Models\ImageDetail::find($id);
    $file = str_replace('storage/','', $file->file);
    //dd($file);
    if(Storage::disk('public')->exists($file)): 
        return Storage::disk('public')->download($file);
    else:
        echo 'file not found';
    endif;
});
