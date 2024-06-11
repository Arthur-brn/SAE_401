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
        'fileCss' => 'home',
        'fileJS' => 'home'
    ]);
});

Route::get('/litterature', function () {

    return view('litterature', [
        'fileCss' => 'litterature_cinema',
        'fileJS' => 'litterature'
    ]);
});


Route::get('/litterature-{id}', function ($id) {

    return view('details_article', [
        'fileCss' => 'details_article',
        'fileJS' => 'details_article',
        'id' => $id,
        'type' => 'book'
    ]);
});

Route::get('/catalogue', function () {

    return view('catalogue', [
        'fileCss' => 'catalogue',
        'fileJS' => ''
    ]);
});

Route::get('/layout', function () {
    return view('layout', [
        'fileCss' => 'layout',
        'fileJS' => ''
    ]);
});

Route::get('/admin', function () {

    return view('admin', [
        'fileCss' => 'admin',
        'fileJS' => ''
    ]);
});

Route::get('/details_article', function () {

    return view('details_article', [
        'fileCss' => 'details_article',
        'fileJS' => ''
    ]);
});

Route::get('/cinema', function () {
    return view('cinema', [
        'fileCss' => 'litterature_cinema',
        'fileJS' => 'cinema'
    ]);
});

Route::get('/cinema-{id}', function ($id) {

    return view('details_article', [
        'fileCss' => 'details_article',
        'fileJS' => '',
        'id' => $id,
        'type' => 'film'
    ]);
});

Route::get('/tendances', function () {
    return view('tendances', [
        'fileCss' => 'tendances',
        'fileJS' => ''
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'fileCss' => 'contact',
        'fileJS' => ''
    ]);
});

Route::get('/connect', function () {
    return view('connect', [
        'fileCss' => 'connect',
        'fileJS' => 'connection'
    ]);
});

Route::get('/account', function () {
    return view('account', [
        'fileCss' => 'account',
        'fileJS' => 'userAccount'
    ]);
});

Route::get('/panier', function () {
    return view('panier', [
        'fileCss' => 'panier',
        'fileJS' => 'panier'
    ]);
});
