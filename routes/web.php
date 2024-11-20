<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('Homepage.newappschedule'); // Adjust this to the view you want for the home page
})->name('home');

Route::get('/newappscheduled', function () {
    return view('Homepage.newappscheduled'); // Correctly reference the view in the Homepage folder
})->name('newappscheduled');

Route::get('/newappschedule', function () {
    return view('Homepage.newappschedule'); // Correctly reference the view in the Homepage folder
})->name('newappschedule');

Route::get('/confirmation', function () {
    return view('Homepage.confirmation_page'); // Correctly reference the view in the Homepage folder
})->name('confirmation');

Route::get('/pending', [BookingController::class, 'showPending'])->name('pending');

Route::get('/profile', function () {
    return view('dash.profile'); // Route to profile.blade.php
})->name('profile');

Route::get('/dashboard', function () {
    return view('dash.dashboard'); // Route to dashboard.blade.php
})->name('dashboard');

Route::post('/store-booking', [BookingController::class, 'store'])->name('store.booking');

Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');

Route::delete('/booking/{id}', [BookingController::class, 'cancel'])->name('booking.cancel');
