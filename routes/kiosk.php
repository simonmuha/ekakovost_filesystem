<?php

// routes/kiosk.php
use Illuminate\Support\Facades\Route;


Route::get('/kiosks/view/{kiosk_id}', [App\Http\Controllers\Kiosks\KiosksController::class, 'view'])->name('kiosks.view');

Route::resource('/kiosk' , App\Http\Controllers\Kiosks\KiosksController::class);