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

Route::get('/api/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/api/teams/{id}', [TeamController::class, 'show'])->name('teams.show');
Route::get('/api/teams/practice/{practice}', [TeamController::class, 'filterByPractice'])->name('teams.filterByPractice');
Route::get('/api/teams/service/{service}', [TeamController::class, 'filterByADRService'])->name('teams.filterByADRService');

Route::get('/api/membership-types', [MembershipTypeController::class, 'index']);

// Route to fetch all homepage data
Route::get('/api/homepage', [HomepageController::class, 'getAllData']);
Route::get('/api/about/who_we_are', [AboutController::class, 'getWhoWeAre']);

Route::get('/api/contacts', [ContactController::class, 'getAllContacts']);


Route::get('/api/practices', [PracticeController::class, 'index']); // Fetch all practices
Route::get('/api/practices/search', [PracticeController::class, 'search']); // Fetch a practice by name


Route::get('/api/about/faqs', [AboutController::class, 'getFaqs']);
Route::get('/api/members', [MembershipController::class, 'getAllMembers']);


Route::get('/api/services', [ServiceController::class, 'index']);
Route::get('/api/service/{name}', [ServiceController::class, 'show']);



// Home Route
Route::get('/', function () {
    return view('index');
})->name('home');

// About & FAQ
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

// Services (All services should be handled in a single blade file)
Route::get('/services', function () {
    return view('pages.services');
})->name('services');

// Rules (Redirect all rules to service_rules.blade.php)
Route::get('/service_rules', function () {
    return view('pages.service_rules');
})->name('service_rules');

// AOP Page
Route::get('/aop', function () {
    return view('pages.aop');
})->name('aop');

// Membership Pages
Route::get('/membership/become-a-member', function () {
    return view('pages.become_a_member');
})->name('membership.become');

Route::get('/membership/member-list', function () {
    return view('pages.memberlist');
})->name('membership.list');

Route::get('/membership/panel', function () {
    return view('pages.panel');
})->name('membership.panel');

// Team Page
Route::get('/team', function () {
    return view('pages.team');
})->name('team');

// Contact Page
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
