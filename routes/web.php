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
Auth::routes();
Route::get('/', 'HomeController@index');


Route::get('/profil/{id}', 'ProfilController@index');
Route::get('/profil/{id}/edit', 'ProfilController@getEdit'); // Formulaire de modification des informations du joueur
Route::post('/profil/{id}/edit', 'ProfilController@postEdit'); // Modification des informatiosn du joueur

Route::get('/joueurs', 'JoueurController@index')->name('joueurs');
Route::get('/joueurs/{pseudo}', 'JoueurController@profil');


Route::get('/equipes', 'EquipeController@index');
Route::get('/equipes/new', 'EquipeController@getEquipe'); // Le formulaire de création d'une équipe
Route::post('/equipes/new', 'EquipeController@postEquipe'); // Pour créer une equipe
Route::get('/equipes/{id}/edit', 'EquipeController@getEdit');


Route::get('/tournois', function () {
    return view('tournois');
});