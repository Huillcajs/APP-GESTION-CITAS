<?php

use App\Http\Controllers\Api\PatientsController;
use App\Http\Controllers\Api\MedicsController;
use App\Http\Controllers\Api\AppointmentsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('Patients', PatientsController::class);
Route::apiResource('Medics', MedicsController::class);
Route::apiResource('Appointments', AppointmentsController::class);
