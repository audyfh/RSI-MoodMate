<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MindChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LandingController::class,'index'])->name('landing');
Route::get('/login',[LoginController::class,'index'])->name('login.form');
Route::get('/register',[RegistController::class,'index'])->name('register.form');
Route::get('/profilesettings',[ProfileController::class,'index'])->name('profile.form');
Route::get('/mindchat', [MindChatController::class,'index'])->name('mindchat');