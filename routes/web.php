<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Main project routes
Route::resource('projects', ProjectController::class);

// Redirect root to projects index
Route::redirect('/', '/projects');

// Fallback route
Route::fallback(function () {
    return redirect('/projects');
});