<?php

// routes/school_quality.php
use Illuminate\Support\Facades\Route;



Route::resource('/school_quality/campaigns', App\Http\Controllers\SchoolQuality\SchoolQualityCampaignsController::class);

Route::get('school_quality/home', [App\Http\Controllers\SchoolQuality\SchoolQualityController::class, 'home']);
Route::get('school_quality', [App\Http\Controllers\SchoolQuality\SchoolQualityController::class, 'home']);
