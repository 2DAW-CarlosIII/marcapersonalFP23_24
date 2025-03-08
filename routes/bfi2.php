<?php

Route::apiResource('domains', \App\Http\Controllers\API\BFI2\DomainController::class);
Route::apiResource('facets', \App\Http\Controllers\API\BFI2\FacetController::class);
Route::apiResource('questions', \App\Http\Controllers\API\BFI2\QuestionController::class);


// Rutas protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {

    // Gestión de evaluaciones
    Route::post('/assessments', [\App\Http\Controllers\API\BFI2\AssessmentController::class, 'createAssessment']);
    Route::get('/assessments', [\App\Http\Controllers\API\BFI2\AssessmentController::class, 'index'])->name('assessments.index');
    Route::get('/assessments/{assessmentId}', [\App\Http\Controllers\API\BFI2\AssessmentController::class, 'show']);
    Route::post('/assessments/{assessmentId}/responses', [\App\Http\Controllers\API\BFI2\AssessmentController::class, 'submitResponses']);
    Route::get('/assessments/{assessmentId}/results', [\App\Http\Controllers\API\BFI2\AssessmentController::class, 'getResults']);
    Route::put('/assessments/{assessmentId}/abandon', [\App\Http\Controllers\API\BFI2\AssessmentController::class, 'abandonAssessment']);
});
