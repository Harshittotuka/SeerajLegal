<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

Route::get('/api/about/faqs', [AboutController::class, 'getFaqs']);





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
