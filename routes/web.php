<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index']);
Route::get('/login',[LoginController::class, 'index']);
Route::get('/admin',[AdminController::class, 'index']);

Route::resource('students',StudentController::class);
