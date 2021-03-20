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
use App\Http\Controllers\Admin\ImportExcelController;


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


    Route::resource('/templates',    TestController::class);

  //  Route::resource('/students',    TestController::class);

    Route::post('/add/students', [StudentController::class ,'store'])->name('student-store');
    Route::post('/edit/{id}/students', [StudentController::class ,'update'])->name('student-edit');

    Route::get('/test1', [TestController::class,'create'])->name('temp-create');
    Route::get('/test', [TestController::class,'index'])->name('temp-main');


     // Route::get('/import_excel', [ImportExcelController::class,'index'])->name('add_student');


    Route::post('/import_excel/import', [ImportExcelController::class,'import'])->name('import_excel');

    Route::get('/students', [StudentController::class,'index'])->name('students');
    Route::get('/add_student', [ImportExcelController::class,'index'])->name('add_student');


    Route::post('/makeimage', [TestController::class,'makeimage'])->name('store_temp');
    Route::post('/printimage', [TestController::class,'printimage'])->name('print-image');


    Route::get("/change-password", [ AdminController::class,'changePassword'])->name("change-password");
    Route::put("/change-password", [ AdminController::class,'postChangePassword'])->name("post-change-password");

    Route::post("/receve" , [StudentController::class , 'receve'])->name("receve"); 
    Route::post("/SMS" , [StudentController::class , 'SMS'])->name("SMS");
    
// Route::get('/import_excel', [ImportExcelController::class,'index'])->name('import_excel');
// Route::post('/import_excel/import', [ImportExcelController::class,'import']);
// ------------------------ delete ------------------------- //
Route::get('import_excel/{importID}',[ImportExcelController::class,'import'])->name('importDelete');
// ------------------------ insert ------------------------ //
Route::post('importInsert',[ImportExcelController::class,'importInsert'])->name('importInsert');
// ------------------------ update ------------------------ //
Route::post('importUpdate',[ImportExcelController::class,'importUpdate'])->name('importUpdate');  
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


Route::get('/test'  , function(){
    echo public_path('storage');
});
