<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports/patients', [ReportController::class, 'patients'])->name('patient.report');
Route::get('/reports/doctors', [ReportController::class, 'doctors'])->name('doctor.report');
Route::get('/reports/appointments', [ReportController::class, 'appointments'])->name('appointment.report');
Route::get('/reports/payments', [ReportController::class, 'payments'])->name('payment.report');