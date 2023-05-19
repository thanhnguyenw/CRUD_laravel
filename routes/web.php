<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/',[StudentController::class,'index'])->name('home');
Route::post('/store',[StudentController::class,'store'])->name('store');

Route::get('edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::post('update/{id}',[StudentController::class,'update'])->name('update');

Route::get('delete/{id}',[StudentController::class,'destroy'])->name('delete');
Route::get('restore/{id}',[StudentController::class,'restore'])->name('restore');