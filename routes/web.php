<?php

use App\Http\Controllers\BocController;
use App\Http\Controllers\HappyQuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MindChatController;

// Route::get('/',[LandingController::class,'index'])->name('landing');
// Route::get('/login',[LoginController::class,'index'])->name('login.form');
// Route::get('/register',[RegistController::class,'index'])->name('register.form');
// Route::get('/profilesettings',[ProfileController::class,'index'])->name('profile.form');
// Route::get('/mindchat', [MindChatController::class,'index'])->name('mindchat');

// Routes yang bisa diakses semua orang (public)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Routes untuk guest (yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login'); // Tambahkan untuk handle form login

    Route::get('/register', [RegistController::class, 'index'])->name('register.form');
    Route::post('/register', [RegistController::class, 'store'])->name('register'); // Tambahkan untuk handle form register
});

// Routes untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Route untuk semua user yang sudah login
    Route::get('/profilesettings', [ProfileController::class, 'index'])->name('profile.form');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('profile.logout');

    // Route khusus untuk user biasa
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/mindchat', [MindChatController::class, 'index'])->name('mindchat');
        Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/user/boc',[BocController::class, 'index'])->name('boc');
        Route::get('/user/happyquest',[HappyQuestController::class,'index'])->name('happyquest');
    });

    // Route khusus untuk admin (siapkan untuk nanti)
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('dashboard');
    });

    // Route khusus untuk psikolog (siapkan untuk nanti)
    Route::middleware(['role:psikolog'])->prefix('psikolog')->name('psikolog.')->group(function () {
        Route::get('/dashboard', function() {
            return view('psikolog.dashboard');
        })->name('dashboard');
    });
});