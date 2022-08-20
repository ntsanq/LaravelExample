<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[WelcomeController::class, 'index']);

Route::resource('students',StudentController::class);
//Route::post('/input',[WelcomeController::class, 'input']);
//Route::group(['prefix'=>'/students', 'as' => 'student.'], function (){
//    Route::get('/',[StudentController::class, 'index'])->name('index');
//    Route::get('/create',[StudentController::class, 'create'])->name('create');
//    Route::post('/create',[StudentController::class, 'store'])->name('store');
//    Route::get('/update/{studentId}',[StudentController::class, 'edit'])->name('edit');
//    Route::put('/update/{studentId}',[StudentController::class, 'update'])->name('update');
//    Route::delete('/delete/{studentId}',[StudentController::class, 'delete'])->name('delete');
//});
