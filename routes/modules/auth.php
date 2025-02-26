<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AppController;

// API routes
Route::middleware('api')
    ->prefix('api')
    ->as('api.')
    ->namespace('Api')
    ->group(function () {
        Route::get('/test', [AppController::class, 'test'])
            ->name('test');
    });

// Entrypoint for REACT app
Route::get('/{any?}', [AppController::class, 'index'])
    ->where('any', '.*')
    ->name('index');
