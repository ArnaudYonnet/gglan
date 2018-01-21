<?php

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
    return view('index');
});

Route::get('/tournois', function () {
    return view('tournois');
});

Route::get('/joueurs', function () {
    return view('joueurs');
});

Route::get('/equipes', function () {
    return view('equipes');
});
