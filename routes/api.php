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
use App\Http\Controllers\AudioLanguageController;
use App\Http\Controllers\SubtitleController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CatalogueController;


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

Route::get('/actor/{id}', [ActorController::class, 'show']);
Route::get('/actors', [ActorController::class, 'index']);

Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/{id}', [FilmController::class, 'show']);
Route::post('/films', [FilmController::class, 'store']);
Route::get('/removeFilm/{id}', [FilmController::class, 'destroy']);
Route::post('/modifyFilm/{id}', [FilmController::class, 'update']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/removeBook/{id}', [BookController::class, 'destroy']);
Route::post('/modifyBook/{id}', [BookController::class, 'update']);

Route::get('/directors', [DirectorController::class, 'index']);
Route::post('/directors', [DirectorController::class, 'store']);
Route::get('/director/{id}', [DirectorController::class, 'show']);

Route::get('/casting/{id}', [CastingController::class, 'getFilmCasting']);
Route::post('/casting', [CastingController::class, 'store']);

Route::get('/bookLoans/{id}', [LoanController::class, 'countBook']);
Route::get('/filmLoans/{id}', [LoanController::class, 'countFilm']);
Route::get('/loans', [LoanController::class, 'index']);
Route::post('/loans', [LoanController::class, 'store']);
Route::post('/checkLoans', [LoanController::class, 'checkLoans']);
Route::get('/removeLoan/{loanRef}', [LoanController::class, 'removeLoan']);
Route::get('/checkBook/{id}', [LoanController::class, 'checkBook']);
Route::get('/checkFilm/{id}', [LoanController::class, 'checkFilm']);
Route::get('/checkCart/{id}', [LoanController::class, 'checkCart']);
Route::post('/modifyLoan/{loanRef}', [LoanController::class, 'update']);
Route::get('/account/loan/{id}', [LoanController::class, 'getCustomerLoan']);

Route::post('/connect', [UserController::class, 'login']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/account/{id}', [UserController::class, 'getCustomerInfo']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);

Route::get('/editors', [EditorController::class, 'index']);
Route::post('/editors', [EditorController::class, 'store']);
Route::get('/editor/{id}', [EditorController::class, 'show']);

Route::get('/languages', [LanguageController::class, 'index']);
Route::get('/language/{id}', [LanguageController::class, 'show']);

Route::get('/filmLanguages/{id}', [AudioLanguageController::class, 'getFilmLanguages']);
Route::post('/audioLanguage', [AudioLanguageController::class, 'store']);

Route::get('/filmSubtitles/{id}', [SubtitleController::class, 'getFilmSubtitles']);
Route::post('/subtitle', [SubtitleController::class, 'store']);

Route::get('/bookReview/{id}', [ReviewController::class, 'getBookReview']);
Route::get('/filmReview/{id}', [ReviewController::class, 'getFilmReview']);

Route::get('/books-most-loaned', [BookController::class, 'mostLoanedBook']);
Route::get('/books-latest', [BookController::class, 'latestBooks']);
Route::get('/books-most-loaned-books', [BookController::class, 'mostLoanedBooks']);

Route::get('/films-most-loaned', [FilmController::class, 'mostLoanedFilm']);
Route::get('/films-latest', [FilmController::class, 'latestFilms']);
Route::get('/films-most-loaned-films', [FilmController::class, 'mostLoanedFilms']);

Route::get('/panier', [LoanController::class, 'fetchLoanUser']);
Route::put('/panier/reserver', [LoanController::class, 'bookItems']);

Route::get('/articles', [CatalogueController::class, 'allArticles']);
