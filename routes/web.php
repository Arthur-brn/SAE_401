<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('home', [
        'fileCss' => ('home')
    ]);
});
Route::get('/litterature', function () {

    return view('litterature', [
        'fileCss' => ('litterature')
    ]);
});


Route::get('/layout', function () {
    return view('layout', [
        'fileCss' => ('layout')
    ]);
});

Route::get('/books', function () {

    return view('books.index', [
        'fileCss' => ('books')
    ]);
});

Route::get('/admin', function () {

    return view('admin', [
        'fileCss' => ('admin')
    ]);
});

Route::get('/cinema', function () {
    return view('cinema', [
        'fileCss' => 'cinema'
    ]);
});

Route::get('/tendances', function () {
    return view('tendances', [
        'fileCss' => 'tendances'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'fileCss' => 'contact'
    ]);
});
