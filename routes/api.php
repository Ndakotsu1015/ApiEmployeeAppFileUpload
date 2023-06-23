<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'prefix' => 'employees',
    ],
    function () {
        Route::get('employee', [App\Http\Controllers\EmployeeController::class, 'index']);

        Route::post('employee', [App\Http\Controllers\EmployeeController::class, 'store']);

        Route::get('employee/{id}', [App\Http\Controllers\EmployeeController::class, 'show']);

        Route::put('employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update']);


        Route::delete('employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy']);


        Route::get('marital-status', [App\Http\Controllers\MaritalStatusController::class, 'index']);


        Route::get('marital-status/{id}', [App\Http\Controllers\MaritalStatusController::class, 'show']);


        Route::get('state', [App\Http\Controllers\StateController::class, 'index']);



        Route::get('state/{id}', [App\Http\Controllers\StateController::class, 'show']);


        Route::get('local-government', [App\Http\Controllers\LocalGovernmentController::class, 'index']);


        Route::get('local-government/{id}', [App\Http\Controllers\LocalGovernmentController::class, 'show']);

        Route::post('/upload', [App\Http\Controllers\FileUploadController::class, 'upload'])->name('file.upload');

        Route::get('/file/get/{filename}/{visibility?}', [App\Http\Controllers\FileUploadController::class, 'getFile'])->name('file.get');


    }
);
