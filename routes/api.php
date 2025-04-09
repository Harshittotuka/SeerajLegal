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
use App\Http\Controllers\Contact2Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SubscriptionController;

// Route to subscribe to the newsletter
Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);


// Route to get all members

Route::post('/membership/apply', [MembershipController::class, 'store']);
Route::post('/membership/{id}/approve', [MembershipController::class, 'approve']);
Route::post('/membership/{id}/reject', [MembershipController::class, 'reject']);
Route::get('/members/all', [MembershipController::class, 'index']);
Route::get('/members/pending', [MembershipController::class, 'pending']);
Route::get('/members/pending/count', [MembershipController::class, 'pendingCount']);




Route::get('/service_count', [TeamController::class, 'serviceCount']);
Route::get('/practice_count', [TeamController::class, 'getPracticeCounts']);

//api to get team based on designation
Route::get('/team/designation/{designation}', [TeamController::class, 'getByDesignation']);




Route::get('/topimages', [ImageController::class, 'index']);  // List all
Route::get('/topimages/{image_id}', [ImageController::class, 'show']);  // Get by ID
Route::put('/topimages/{image_id}', [ImageController::class, 'update']);  // Update by ID


//api to update json file of personal details(nova)
Route::put('/update-personal-details', [Contact2Controller::class, 'update']);


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


//create, update, delete, for membershipType(nova)
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

Route::post('/upload-cropped-image', [ImageController::class, 'uploadCroppedImage']);

Route::prefix('admin')->group(function () {
    Route::post('/create', [AdminController::class, 'create']); // Create admin
    Route::put('/{id}/edit', [AdminController::class, 'edit']); // Edit admin
    Route::delete('/delete/{id}', [AdminController::class, 'delete']); // Delete admin
    Route::get('/', [AdminController::class, 'index']); // Add this route for getting admins
    Route::get('/{id}', [AdminController::class, 'getAccountById']);
    Route::post('/update-password/{id}', [AdminController::class, 'updatePassword']);
    Route::post('/{id}/update-password-d', [AdminController::class, 'updatePasswordDirect']);



});