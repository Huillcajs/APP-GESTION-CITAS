<?php

use App\Http\Controllers\Api\PatientsController;
use Illuminate\Support\Facades\Route;


Route::apiResource('Patients', PatientsController::class);

