<?php

use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::inertia('indexinertia', 'Dashboard/Post/Index');

Route::middleware(
    ['auth', 'verified'],
)->prefix('dashboard')->group(function () {
    Route::resource('/category', CategoryController::class);

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
