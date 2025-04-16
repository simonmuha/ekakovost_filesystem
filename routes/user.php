<?php

use Illuminate\Support\Facades\Route;

// routes/user.php


Route::resource('/users/files', App\Http\Controllers\User\FilesController::class);
