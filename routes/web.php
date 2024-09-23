<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Quiz;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/quiz', function() {
    return Inertia::render('Quiz');
})->middleware(['auth', 'verified'])->name('quiz');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::get('/quiz/index', [Quiz::class, 'index']); //Inertia::render('Dashboard')
    Route::get('/quiz/{id}', [Quiz::class, 'show']); //Inertia::render('Dashboard')
    Route::post('/quiz/create', [Quiz::class, 'create']); 
    Route::get('/quiz/new', [Quiz::class, 'new']); //Inertia::render('Dashboard')
    Route::get('/quiz/{id}/edit', [Quiz::class, 'edit']); //Inertia::render('Dashboard')
    Route::put('/quiz/{id]', [Quiz::class, 'update']);
    Route::delete('/quiz/{id}', [Quiz::class, 'destroy']);

});

require __DIR__.'/auth.php';
