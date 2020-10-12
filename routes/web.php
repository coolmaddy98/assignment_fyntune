<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\AdminController;
use  App\Http\Controllers\BlogController;
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

Route::get("/",[\App\Http\Controllers\UserController::class,'index'])->name("app");
Route::get("/login",[\App\Http\Controllers\LoginController::class,'login'])->name("login");
Route::get("/logout",[\App\Http\Controllers\LoginController::class,'logout'])->name("logout");
Route::get("/register",[\App\Http\Controllers\LoginController::class,'register'])->name("register");
Route::post("/register",[\App\Http\Controllers\LoginController::class,'create'])->name("users.create");
Route::post("/login",[\App\Http\Controllers\LoginController::class,'authenticate'])->name("front.login");
Route::get("/Dashboard",[AdminController::class,'index'])->name("admin.index");
Route::get('blog/add',[BlogController::class,'add'])->name("blogs.add");
Route::post('blog/add',[BlogController::class,'create'])->name("blogs.create");
