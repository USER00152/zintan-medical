<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SpecialtyController;
use App\Http\Controllers\Api\ClinicController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Support\Facades\Route;

// Routes مفتوحة
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/specialties', [SpecialtyController::class, 'index']);
Route::get('/specialties/{id}', [SpecialtyController::class, 'show']);

Route::get('/clinics', [ClinicController::class, 'index']);
Route::get('/clinics/{id}', [ClinicController::class, 'show']);

Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);

Route::get('/doctors/{doctorId}/reviews', [ReviewController::class, 'doctorReviews']);

// Routes محمية (لازم Token صحيح)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments']);
    Route::post('/appointments/{id}/cancel', [AppointmentController::class, 'cancel']);

    Route::post('/payments', [PaymentController::class, 'store']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    
    Route::get('/doctors/{doctorId}/available-slots', [ScheduleController::class, 'availableSlots']);

    // ══ إدارة التخصصات (Admin) ══
    Route::post('/specialties', [SpecialtyController::class, 'store']);
    Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy']);

    // ══ إدارة العيادات (Admin) ══
    Route::post('/clinics', [ClinicController::class, 'store']);
    Route::delete('/clinics/{id}', [ClinicController::class, 'destroy']);

    // ══ إدارة الأطباء (Admin) ══
    Route::post('/doctors', [DoctorController::class, 'store']);
    Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);

    // ══ تأكيد الموعد (Admin) ══
    Route::post('/appointments/{id}/confirm', [AppointmentController::class, 'confirm']);
});