<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Admin\PersonilController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\Contact;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LandingController;

Route::get('/doc', function () {
    return view('landing.index_doc');
});

Route::get('/', [LandingController::class, 'index'])->name('landing.v2');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected by Auth Middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    //background
    Route::get('/background', [BackgroundController::class, 'index'])->name('background.index');
    Route::post('/background', [BackgroundController::class, 'store'])->name('background.store');
    Route::put('/background/{id}', [BackgroundController::class, 'update'])->name('background.update');
    Route::delete('/background/{id}', [BackgroundController::class, 'destroy'])->name('background.destroy');
    Route::post('/background/{id}/toggle', [BackgroundController::class, 'toggleActive'])->name('background.toggle');

    //personil
    Route::get('/personil', [PersonilController::class, 'index'])->name('personil.index');
    Route::post('/personil', [PersonilController::class, 'store'])->name('personil.store');
    Route::put('/personil/{id}', [PersonilController::class, 'update'])->name('personil.update');
    Route::delete('/personil/{id}', [PersonilController::class, 'destroy'])->name('personil.destroy');
    Route::post('/personil/{id}/toggle', [PersonilController::class, 'toggleActive'])->name('personil.toggle');

    //songs
    Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
    Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
    Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');
    Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy');
    Route::post('/songs/{id}/toggle', [SongController::class, 'toggleActive'])->name('songs.toggle');

    //events
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::post('/events/{id}/toggle', [EventController::class, 'toggleActive'])->name('events.toggle');

    //award
    Route::get('/award', [AwardController::class, 'index'])->name('award.index');
    Route::post('/award', [AwardController::class, 'store'])->name('award.store');
    Route::put('/award/{id}', [AwardController::class, 'update'])->name('award.update');
    Route::delete('/award/{id}', [AwardController::class, 'destroy'])->name('award.destroy');
    Route::post('/award/{id}/toggle', [AwardController::class, 'toggleActive'])->name('award.toggle');

    //contact
    // Route::get('/contact', [Contact::class, 'index'])->name('contact');

    //settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
});