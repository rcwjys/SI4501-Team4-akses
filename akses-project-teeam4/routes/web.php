<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\MedicalStaff\AuthController;
use App\Http\Controllers\Institution\InstitutionController;

Route::get('/', [CitizenController::class, 'index']);


//* Authentication Routes

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


//* Institution Routes

Route::get('/health-institution', [InstitutionController::class, 'showInstitutionForm'])->name('institution');

Route::get('/health-institution/verification', [InstitutionController::class, 'showVerificationInfo']);

Route::get('/health-institution/check-status', [InstitutionController::class, 'showVerificationStatus']);
Route::post('/health-institution/status', [InstitutionController::class, 'VerificationStatus']);

Route::get('/health-institution/status', [InstitutionController::class, 'showVerificationStatus']);



Route::post('/health-institution', [InstitutionController::class, 'store']);

