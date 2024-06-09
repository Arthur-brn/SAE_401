<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/author/{id}', [AuthorController::class, 'show']);

Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/{id}', [FilmController::class, 'show']);
Route::post('/films', [FilmController::class, 'store']);
Route::get('/removeFilm/{id}', [FilmController::class, 'destroy']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/removeBook/{id}', [BookController::class, 'destroy']);

Route::get('/directors', [DirectorController::class, 'index']);
Route::get('/director/{id}', [DirectorController::class, 'show']);

Route::get('/bookLoans/{id}', [LoanController::class, 'countBook']);
Route::get('/filmLoans/{id}', [LoanController::class, 'countFilm']);
Route::get('/loans', [LoanController::class, 'index']);
Route::get('/removeLoan/{loanRef}', [LoanController::class, 'removeLoan']);
Route::get('/checkBook/{id}', [LoanController::class, 'checkBook']);
Route::get('/checkFilm/{id}', [LoanController::class, 'checkFilm']);

Route::post('/connect', [UserController::class, 'login']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/account/{id}', [UserController::class, 'getCustomerInfo']);
Route::get('/account/loan/{id}', [UserController::class, 'getCustomerLoan']);

Route::get('/authors', [AuthorController::class, 'index']);

Route::get('/editors', [EditorController::class, 'index']);

Route::get('/languages', [LanguageController::class, 'index']);


Route::get('/books-most-loaned', [BookController::class, 'mostLoanedBook']);
Route::get('/books-latest', [BookController::class, 'latestBooks']);
Route::get('/books-most-loaned-books', [BookController::class, 'mostLoanedBooks']);
