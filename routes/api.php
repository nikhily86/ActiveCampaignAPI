<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("add",[App\Http\Controllers\activeController::class,'add'])->name('data.add');

Route::put("update/{id}",[App\Http\Controllers\activeController::class,'update']);

Route::delete('delete/{id}',[App\Http\Controllers\activeController::class,'delete']);

// Route::get('data',[App\Http\Controllers\activeController::class,'getdata']);

// Route::post("addData",[App\Http\Controllers\activeController::class,'addData'])->name('data.addData');

// Route::post("getData",[App\Http\Controllers\activeController::class,'getData'])->name('data.getData');

// Route::post("updateData",[App\Http\Controllers\activeController::class,'updateData'])->name('data.updateData');

// Route::post("deleteData",[App\Http\Controllers\activeController::class,'deleteData'])->name('data.deleteData');



