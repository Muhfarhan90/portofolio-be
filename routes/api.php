<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\ContactMessageController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('educations', EducationController::class);
    Route::apiResource('skills', SkillController::class);
    Route::apiResource('certificates', CertificateController::class);
    Route::apiResource('experiences', ExperienceController::class);
    Route::apiResource('contact-messages', ContactMessageController::class);
    Route::post('auth/logout', [AuthController::class, 'logout']);
});

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});
