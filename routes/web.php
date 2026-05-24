<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LicenciaController;

Route::get('/', [LicenciaController::class, 'dashboard'])
    ->name('dashboard');

Route::resource('licencias', LicenciaController::class);