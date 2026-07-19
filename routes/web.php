<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/home', [PageController::class, 'home'])->name('home.page');
Route::get('/doctors', [PageController::class, 'doctors'])->name('doctors');
Route::get('/specialties', [PageController::class, 'specialties'])->name('specialties');
Route::get('/pharmacies', [PageController::class, 'pharmacies'])->name('pharmacies');
Route::get('/booking', [PageController::class, 'booking'])->name('booking');
Route::get('/appointments', [PageController::class, 'appointments'])->name('appointments');
Route::get('/consultation', [PageController::class, 'consultation'])->name('consultation');
Route::get('/join', [PageController::class, 'join'])->name('join');
Route::post('/join', [PageController::class, 'joinStore'])->name('join.store');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');