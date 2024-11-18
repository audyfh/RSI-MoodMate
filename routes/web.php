<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BocController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MindChatController;
use App\Http\Controllers\AdminQuestController;
use App\Http\Controllers\CsController;
use App\Http\Controllers\EtController;
use App\Http\Controllers\HappyQuestController;

// Route::get('/',[LandingController::class,'index'])->name('landing');
// Route::get('/login',[LoginController::class,'index'])->name('login.form');
// Route::get('/register',[RegistController::class,'index'])->name('register.form');
// Route::get('/profilesettings',[ProfileController::class,'index'])->name('profile.form');
// Route::get('/mindchat', [MindChatController::class,'index'])->name('mindchat');

// Routes public
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Routes guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login'); 

    Route::get('/register', [RegistController::class, 'index'])->name('register.form');
    Route::post('/register', [RegistController::class, 'store'])->name('register'); 
});

// Routes untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Route untuk semua user yang sudah login
    Route::get('/profilesettings', [ProfileController::class, 'index'])->name('profile.form');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('profile.logout');

    // Route User
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/mindchat', [MindChatController::class, 'index'])->name('mindchat');
        Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/user/boc',[BocController::class, 'index'])->name('boc');
        Route::get('/user/happyquest',[HappyQuestController::class,'index'])->name('happyquest');
        Route::post('/quests/{quest}/complete', [HappyQuestController::class, 'completeQuest'])->name('completequest');
        Route::get('/user/communitysupport', [CsController::class,'index'])->name('communitysupport');
        Route::get('/user/emotiontrack',[EtController::class,'index'])->name('emotion_track.index');
        Route::post('/emotion-track', [EtController::class, 'store'])->name('emotion_track.store');
        Route::delete('/emotion-track/{id}', [EtController::class, 'destroy'])->name('emotion_track.destroy');
    });

    // Route Admin
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('dashboard');

        // Halaman utama admin happy quest
        Route::get('/happyquest', [AdminQuestController::class, 'index'])->name('happyquest');
        
        // Quest CRUD operations
        Route::post('/quests', [AdminQuestController::class, 'store'])->name('quests.store');
        Route::put('/quests/{quest}', [AdminQuestController::class, 'update'])->name('quests.update');
        Route::delete('/quests/{quest}', [AdminQuestController::class, 'destroy'])->name('quests.destroy');
    });

    // Route Psikolog
    Route::middleware(['role:psikolog'])->prefix('psikolog')->name('psikolog.')->group(function () {
        Route::get('/dashboard', function() {
            return view('psikolog.dashboard');
        })->name('dashboard');
    });
});