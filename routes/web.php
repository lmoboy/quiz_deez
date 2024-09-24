<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizControllers;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/test', function () {
    return Inertia::render('PlayArea');
})->middleware(['auth', 'verified'])->name('test');


Route::get('/quiz', function () {
    return Inertia::render('Quiz');
})->middleware(['auth', 'verified'])->name('quiz');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/quiz/index', [QuizControllers::class, 'index']); //returns a list of all quizes
    Route::get('/quiz/{id}', [QuizControllers::class, 'show']); //returns a single quiz with specific id
    Route::post('/quiz/create', [QuizControllers::class, 'create']);
    Route::get('/quiz/new', [QuizControllers::class, 'new']); //Inertia::render('Dashboard')
    Route::get('/quiz/{id}/edit', [QuizControllers::class, 'edit']); //Inertia::render('Dashboard')
    Route::put('/quiz/{id]', [QuizControllers::class, 'update']);
    Route::delete('/quiz/{id}', [QuizControllers::class, 'destroy']);

});

require __DIR__ . '/auth.php';
