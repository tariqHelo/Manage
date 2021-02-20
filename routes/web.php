<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\AdminController;


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
// Route::get('/test', [TestController::class, 'index'])->name('test');
// Route::get('roles',    [RoleController::class,'index']);
//  Route::get('users',    [UserController::class,'index']);
    // Route::get('users',    [UserController::class, 'index']);
    // Route::get('rols',    [RoleController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('roles',    RoleController::class);
    Route::resource('users',    UserController::class);

    Route::get('/test', [TestController::class, 'index'])->name('test');


    Route::get("/change-password", [ AdminController::class,'changePassword'])->name("change-password");
    Route::put("/change-password", [ AdminController::class,'postChangePassword'])->name("post-change-password");

});
