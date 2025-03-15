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
use App\Http\Controllers\UpdateController;

//api to update homepage and who we are pages json file
Route::post('/update', [UpdateController::class, 'update']);



//fetching data of who we are according to S_id
//api to get data of who we are by S_id
Route::post('about/who_we_are', [AboutController::class, 'getWhoWeAre']);

//update,delete for faqs (nova)
Route::prefix('faqs')->group(function () {
Route::post('update/{Sno}', [AboutController::class, 'updateFaq']);
Route::delete('delete/{Sno}', [AboutController::class, 'deleteFaq']);
Route::post('create', [AboutController::class, 'store']);
});


//create, update, delete, for membership_type(nova)
// Routes: api.php
Route::prefix('membership-types')->group(function () {
    Route::post('create', [MembershipTypeController::class, 'create']);
    Route::post('update/{membershipType}', [MembershipTypeController::class, 'update']);
    Route::delete('delete/{membershipType}', [MembershipTypeController::class, 'delete']);
});


//toggle api for service and practices(nova)

Route::post('/toggle-service-flag/{service_name}', [ServiceController::class, 'toggleFlag']);
Route::post('/toggle-practice-flag/{practice_name}', [PracticeController::class, 'toggleFlag']);


//apis for insert,update,delete(nova)
Route::prefix('practices')->group(function () {
    Route::post('/create', [PracticeController::class, 'store']);
    Route::post('/update-practice/{practice_name}', [PracticeController::class, 'update']);
    Route::delete('/delete/{practice_name}', [PracticeController::class, 'destroy']);
});

Route::post('/services/create', [ServiceController::class, 'store']);
Route::delete('/services/delete/{name}', [ServiceController::class, 'deleteByName']);
Route::post('/services/update-service/{service_name}', [ServiceController::class, 'update']);


Route::post('/teams/create', [TeamController::class, 'create']);
Route::delete('/teams/{id}', [TeamController::class, 'delete']);

Route::get('/teams/filter', [TeamController::class, 'filterTeams']);

Route::put('/teams/{id}', [TeamController::class, 'update']);



Route::post('/members/create', [MembershipController::class, 'createMember']);  // Create a member
Route::delete('/members/{id}', [MembershipController::class, 'deleteMember']); // Delete a member
Route::put('/members/{id}', [MembershipController::class, 'update']);

Route::post('/contact/create', [ContactController::class, 'store']);
Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy']);
Route::put('/contact/update/{id}', [ContactController::class, 'update']);