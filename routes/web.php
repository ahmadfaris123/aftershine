<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Background;
use App\Http\Controllers\Admin\Personil;
use App\Http\Controllers\Admin\Songs;
use App\Http\Controllers\Admin\Events;
use App\Http\Controllers\Admin\Award;
use App\Http\Controllers\Admin\Contact;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('landing.index');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected by Auth Middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    //background
    Route::get('/background', [Background::class, 'index'])->name('background');

    //personil
    Route::get('/personil', [Personil::class, 'index'])->name('personil');

    //songs
    Route::get('/songs', [Songs::class, 'index'])->name('songs');

    //events
    Route::get('/events', [Events::class, 'index'])->name('events');

    //award
    Route::get('/award', [Award::class, 'index'])->name('award');

    //contact
    Route::get('/contact', [Contact::class, 'index'])->name('contact');

    //settings
    Route::get('/settings', [Settings::class, 'index'])->name('settings');
});