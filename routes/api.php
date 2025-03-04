<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ServiceController;

//apis for insert,update,delete
Route::prefix('practices')->group(function () {
    Route::post('/create', [PracticeController::class, 'store']);
    Route::put('/update/{id}', [PracticeController::class, 'update']);
    Route::delete('/delete/{id}', [PracticeController::class, 'destroy']);
});


Route::post('/services/create', [ServiceController::class, 'store']);