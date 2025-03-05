<?php

Route::apiResource('domains', \App\Http\Controllers\API\BFI2\DomainController::class);
Route::apiResource('facets', \App\Http\Controllers\API\BFI2\FacetController::class);
Route::apiResource('questions', \App\Http\Controllers\API\BFI2\QuestionController::class);
