<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\MedicalStaff\AuthController;
use App\Http\Controllers\Institution\InstitutionController;
use App\Http\Controllers\Role\RoleController;

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


// * Restricted Access

Route::get('/verificaiton-request', [InstitutionController::class, 'showVerificationData']);

Route::get('/health-institution/{institution_id}/details', [InstitutionController::class, 'showInstitutionDetail']);

Route::patch('/verification-request/update-status/{institution_id}', [InstitutionController::class, 'updateStatus']);

Route::patch('/verification-request/reject/{institution_id}', [InstitutionController::class, 'rejectStatus']);


//* Roles

Route::get('/roles', [RoleController::class, 'showRole']);

Route::get('/create-roles', [RoleController::class, 'showCreateRoleForm']);
Route::post('/create-roles', [RoleController::class, 'storeRole']);

Route::get('/update-roles', [RoleController::class, 'showEditRoleForm']);
Route::patch('/update-roles', [RoleController::class, 'updateForm']);

Route::delete('/delete-role', [RoleController::class, 'destoryRoleData']);
