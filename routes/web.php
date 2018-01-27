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

Route::get('/', 'HomeController@index');

Route::get('/tournois', function () {
    return view('tournois');
});

Route::get('/joueurs', 'JoueurController@index')->name('joueurs');
Route::get('/joueurs/{pseudo}', 'JoueurController@profil');




Route::get('/equipes', 'EquipeController@index');
Route::get('/equipes/new', 'EquipeController@getEquipe'); // Le formulaire de création d'une équipe
Route::post('/equipes/new', 'EquipeController@postEquipe')->name('postEquipe'); // Pour créer une equipe
Route::get('/equipes/{id}/edit', 'EquipeController@getEdit');

Route::get('/profil/{id}', 'ProfilController@index')->name('profil');

Auth::routes();
