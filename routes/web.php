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

//api to get rules according to service name

Route::get('/api/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/api/teams/{id}', [TeamController::class, 'show'])->name('teams.show');
Route::get('/api/teams/practice/{practice}', [TeamController::class, 'filterByPractice'])->name('teams.filterByPractice');
Route::get('/api/teams/service/{service}', [TeamController::class, 'filterByADRService'])->name('teams.filterByADRService');

Route::get('/api/membership-types', [MembershipTypeController::class, 'index']);

// Route to fetch all homepage data
Route::get('/api/homepage', [HomepageController::class, 'getAllData']);


Route::get('/api/contacts', [ContactController::class, 'getAllContacts']);


Route::get('/api/practices', [PracticeController::class, 'index']); // Fetch all practices
Route::get('/api/practices/search', [PracticeController::class, 'search']); // Fetch a practice by name
Route::get('/api/practices/list', [PracticeController::class, 'getPracticeNames']);


Route::get('/api/about/faqs', [AboutController::class, 'getFaqs']);
Route::get('/api/members', [MembershipController::class, 'getAllMembers']);


Route::get('/api/services', [ServiceController::class, 'index']);
Route::get('/api/service/{name}', [ServiceController::class, 'show']);
Route::get('/api/services/list', [ServiceController::class, 'getServiceNames']);

Route::get('/api/services/rules/{service_name}', [ServiceController::class, 'getServiceByName']);


Route::get('/backend/', function () {
    return view('backend/index');
})->name('backend.home');


Route::get('/backend/faq', function () {
    return view('backend/pages/faq');
})->name('backend.faq');

Route::get('/backend/members', function () {
    return view('backend/pages/members');
})->name('backend.members');

Route::get('/backend/teams', function () {
    return view('backend/pages/teams');
})->name('backend.teams');

Route::get('/backend/service/form', function () {
    return view('backend/pages/serviceform');
})->name('backend.service.form');

Route::get('/backend/service/list', function () {
    return view('backend/pages/servicelist');
})->name('backend.service.list');


Route::get('/backend/practice/form', function () {
    return view('backend/pages/practiceform');
})->name('backend.practice.form');

Route::get('/backend/practice/list', function () {
    return view('backend/pages/practicelist');
})->name('backend.practice.list');



















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
Route::get('/service/{serviceName}', function ($serviceName) {
    return view('pages.services', compact('serviceName'));
})->name('service.details');


// Rules (Redirect all rules to service_rules.blade.php)
Route::get('/service_rules', function () {
    return view('pages.service_rules');
})->name('service_rules');

// Services (All services should be handled in a single blade file)
Route::get('/services', function () {
    return view('pages.services-all');
})->name('service.all');

Route::get('/practice/{name}', function ($name) {
    return view('pages.practice', ['practiceName' => $name]);
})->name('practice.details');


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

// Team Page
Route::get('/team-details', function () {
    return view('pages.team_detail');
})->name('team.details');

// Contact Page
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
