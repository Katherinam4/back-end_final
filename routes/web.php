<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', [AuthController::class, "register"])->name("signup");
Route::post('/signup', [AuthController::class, "registerHandling"]);
Route::get('/login', [AuthController::class, "signin"])->name("login");
Route::post('/login', [AuthController::class, "signinHandling"]);

Route::middleware('auth')->group(function () {
    Route::get('/quizzes', [QuizController::class, 'homeIndex'])->name("quizzes.index");
    Route::get('/quizzes/create', [QuizController::class, 'makeQuizz'])->name('quizzes.create');
    Route::post('/quizzes', [QuizController::class, 'saveQuizz'])->name('quizzes.store');
    Route::post('/quizzes/{quiz}/publish', [QuizController::class, 'deployQuizz'])->name('quizzes.publish');
    Route::get('/pending', [QuizController::class, 'savedQuizz'])->name('quizzes.pending');
    Route::delete('/pending/{quiz}', [QuizController::class, 'removeQuizz'])->name('quizzes.destroy');
    Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'updateQuizz'])->name('quizzes.edit');
    Route::put('/quizzes/{quiz}', [QuizController::class, 'putQuizz'])->name('quizzes.update');
    Route::get('/questions/create', [QuestionController::class, 'addQuestion'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'saveQuestion'])->name('questions.store');
    Route::get('/questions/all', [QuestionController::class, 'listOfQuestions'])->name('questions.all');
    Route::put('question/{id}', [QuestionController::class, 'putQuestion'])->name('question.update');
    Route::get('/quizzes/{id}', [QuizController::class, 'displayQuizz'])->name('quizzes.show');
    Route::post('/quizzes/{quiz}/attempt', [QuizController::class, 'beginQuiz'])->name('quizzes.attempt');
    Route::post('/quizzes/{quiz}/result', [QuizController::class, 'QuizzResultset'])->name('quizzes.result');
});

