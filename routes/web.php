<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("getData",[App\Http\Controllers\activeController::class,'getData'])->name('data.getData');

Route::post("addData",[App\Http\Controllers\activeController::class,'addData'])->name('data.addData');

Route::get("update/{id}",[App\Http\Controllers\activeController::class,'update']);

Route::post("updateData",[App\Http\Controllers\activeController::class,'updateData'])->name('data.updateData');

Route::get("deleteData/{id}",[App\Http\Controllers\activeController::class,'deleteData'])->name('data.deleteData');


