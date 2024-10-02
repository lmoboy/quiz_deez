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

Route::get('/addquiz', function () {
    return Inertia::render('AddQuiz');
})->middleware(['auth', 'verified'])->name('addquiz');

Route::get('/updatequiz', function () {
    return Inertia::render('UpdateQuiz');
})->middleware(['auth', 'verified'])->name('updatequiz');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/api_quiz/highscore', [QuizControllers::class, 'highscore']);
    Route::get('/api_quiz/all', [QuizControllers::class, 'all']);
    Route::get('/api_quiz/amount', [QuizControllers::class, 'amount']);
    Route::get('/api_quiz/categories', [QuizControllers::class, 'categories']); //returns a list of all categories
    Route::get('/api_quiz', [QuizControllers::class, 'index']); //returns a list of all quizes
    Route::get('/api_quiz/{id}', [QuizControllers::class, 'show']); //returns a single quiz with specific id
    Route::put('/api_quiz/edit/{id}', [QuizControllers::class, 'store']);
    Route::delete('/api_quiz/{id}', [QuizControllers::class, 'destroy']);
    Route::post('/api_quiz', [QuizControllers::class, 'create']);

});


// Sad dream that did not come true
// Route::apiResource('api_quiz', QuizControllers::class)->only([
//     'index',
//     'show',
//     'store',
//     'edit',
//     'update',
//     'destroy'
// ])->middleware('auth:sanctum');



require __DIR__ . '/auth.php';
