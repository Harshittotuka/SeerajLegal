<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MembershipTypeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TeamController;
//toggle api for service and practices

Route::post('/toggle-service-flag/{service_name}', [ServiceController::class, 'toggleFlag']);
Route::post('/toggle-practice-flag/{practice_name}', [PracticeController::class, 'toggleFlag']);


//apis for insert,update,delete
Route::prefix('practices')->group(function () {
    Route::post('/create', [PracticeController::class, 'store']);
    Route::put('/update/{id}', [PracticeController::class, 'update']);
    Route::delete('/delete/{practice_name}', [PracticeController::class, 'destroy']);
});

Route::post('/services/create', [ServiceController::class, 'store']);
Route::delete('/services/delete/{name}', [ServiceController::class, 'deleteByName']);
