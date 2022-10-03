<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::resource('/patients', PatientController::class);
Route::get('/patients/{patient}/attendances', [PatientController::class, 'getAllAttendances']);

Route::post('/attendance', [AttendanceController::class, 'store']);
Route::get('/attendance/{attendance}', [AttendanceController::class, 'find']);
