<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use  App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

Route::get("/",[UserController::class,'index'])->name("app");
Route::get("/login",[LoginController::class,'login'])->name("login");
Route::get("/logout",[LoginController::class,'logout'])->name("logout");
Route::get("/register",[LoginController::class,'register'])->name("register");
Route::post("/register",[LoginController::class,'create'])->name("users.create");
Route::post("/login",[LoginController::class,'authenticate'])->name("front.login");
Route::get("/Dashboard",[AdminController::class,'index'])->name("admin.index");
Route::get('blog/add',[BlogController::class,'add'])->name("blogs.add");
Route::post('blog/add',[BlogController::class,'create'])->name("blogs.create");
Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name("blogs.edit");
Route::post('blog/edit/{id}',[BlogController::class,'update'])->name("blogs.update");
Route::get('blog/delete/{id}',[BlogController::class,'delete'])->name("blogs.delete");
Route::get('blog/category/{id}',[UserController::class,'categoryBlog'])->name("blogs.category");
