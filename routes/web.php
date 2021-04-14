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


use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\GroupController;



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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix'=>'admin','middleware' => ['auth']], function () {
    
     // Permissions
     Route::delete('permissions/destroy',[PermissionsController::class
     ,'massDestroy'])->name('permissions.massDestroy');
     Route::resource('permissions', PermissionsController::class);
     // Roles
     Route::delete('roles/destroy', [RolesController::class,'massDestroy'])->name('roles.massDestroy');
     Route::resource('roles', RolesController::class);
     // Users
     Route::delete('users/destroy',[UsersController::class,'massDestroy'])->name('users.massDestroy');
     Route::resource('users', UsersController::class);
     //change-password
     Route::get("/change-password", [ AdminController::class,'changePassword'])->name("change-password");
     Route::put("/change-password", [ AdminController::class,'postChangePassword'])->name("post-change-password");

    Route::resource('/groups', GroupController::class);
    Route::post('/update/groups/{id}', [GroupController::class ,'update'])->name('groups-update');
    Route::get('/delete/groups/{id}', [GroupController::class ,'destroy'])->name('groups-delete');


    Route::resource('/templates',    TestController::class);

  //  Route::resource('/students',    TestController::class);

    Route::post('/add/students', [StudentController::class ,'store'])->name('student-store');
    Route::post('/update/students/{id}', [StudentController::class ,'update'])->name('student-update');
    Route::get('/delete/students/{id}', [StudentController::class ,'destroy'])->name('student-delete');

    Route::get('/test1', [TestController::class,'create'])->name('temp-create');
    Route::get('/test', [TestController::class,'index'])->name('temp-main');


    

     // Route::get('/import_excel', [ImportExcelController::class,'index'])->name('add_student');


    Route::post('/import_excel/import', [ImportExcelController::class,'import'])->name('import_excel');

    Route::get('/students', [StudentController::class,'index'])->name('students');
    Route::post('/search-by-group', [StudentController::class,'search'])->name('search-by-group');
    Route::get('/add_student', [ImportExcelController::class,'index'])->name('add_student');


    Route::post('/makeimage', [TestController::class,'makeimage'])->name('store_temp');
    Route::post('/printimage', [TestController::class,'printimage'])->name('print-image');
    Route::post('/update-print-image/{id}', [TestController::class,'updateprintimage'])->name('update-print-image');


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
