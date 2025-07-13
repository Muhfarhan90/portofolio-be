<?php

use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('projects', ProjectController::class);
Route::apiResource('educations', EducationController::class);
Route::apiResource('skills', SkillController::class);
Route::apiResource('certificates', CertificateController::class);
