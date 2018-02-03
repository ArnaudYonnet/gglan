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
Route::get('/', 'HomeController@index'); // Accueil

/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/
Route::get('/profil/{id}', 'ProfilController@index'); // Profil personnel

Route::get('/profil/{id}/edit', 'ProfilController@getEdit'); // Formulaire de modification des informations du joueur
Route::post('/profil/{id}/edit', 'ProfilController@postEdit'); // Modification des informatiosn du joueur


/*
|--------------------------------------------------------------------------
| Joueurs
|--------------------------------------------------------------------------
*/
Route::get('/joueurs', 'JoueurController@index')->name('joueurs'); // Listing des joueurs inscrits
Route::get('/joueurs/{pseudo}', 'JoueurController@profil'); // Profil du joueur


/*
|--------------------------------------------------------------------------
| Equipes
|--------------------------------------------------------------------------
*/
Route::get('/equipes', 'EquipeController@index'); // Listing des équipes inscrites
Route::get('/equipes/{id}/profil', 'EquipeController@profilEquipe'); // Profil de l'équipe 

Route::get('/equipes/new', 'EquipeController@getEquipe'); // Le formulaire de création d'une équipe
Route::post('/equipes/new', 'EquipeController@postEquipe'); // Pour créer une equipe

Route::post('/equipes/{id}/add', 'EquipeController@postEquipier');

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/equipes/{id_equipe}/delete/joueur/{id_user}', 'EquipeController@deleteEquipier'); // Supprime le joueur de l'équipe


/*
|--------------------------------------------------------------------------
| Tournois
|--------------------------------------------------------------------------
*/
Route::get('/tournois', 'TournoisController@index'); // Les anciens tournois
Route::get('/tournois/inscription/{id}', 'TournoisController@inscription'); // Inscription équipe au prochain tournois