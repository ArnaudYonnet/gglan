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

Route::get('/articles/{id_article}', 'ArticleController@readArticle'); // Affiche un article
Route::get('/reglement', 'HomeController@reglement');
Route::get('/infos', 'HomeController@infos');

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

Route::post('/equipes/{id}/add', 'EquipeController@postEquipier'); // Ajoute un joueur à l'équipe
Route::get('/equipes/{id_equipe}/delete/joueur/{id_user}', 'EquipeController@deleteEquipier'); // Supprime le joueur de l'équipe


/*
|--------------------------------------------------------------------------
| Tournois
|--------------------------------------------------------------------------
*/
Route::get('/tournois', 'TournoisController@index'); // Les anciens tournois
Route::get('/tournois/inscription/{id}', 'TournoisController@inscription'); // Inscription équipe au prochain tournois


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
//Admin
Route::get('/admin', 'AdminController@index'); //Page d'accueil du panel admin
Route::get('/admin/tournois', 'AdminController@tournois'); // Liste des tournois 

//Joueurs
Route::get('/admin/joueurs', 'AdminController@joueurs'); // Liste des joueurs

Route::get('/admin/delete/joueurs/{id_joueur}', 'AdminController@deleteJoueurs'); // Suppression dun joueur

Route::get('/admin/create/joueurs', 'AdminController@getJoueurs'); // Formulaire de création d'un joueur
Route::post('/admin/create/joueurs', 'AdminController@postJoueurs'); // Création d'un joueur

Route::get('/admin/edit/joueurs/{id_joueur}', 'AdminController@getEditJoueurs'); // Formulaire de modification d'un joueur
Route::post('/admin/edit/joueurs/{id_joueur}', 'AdminController@postEditJoueurs'); // Mdification d'un joueur


//Equipes
Route::get('/admin/equipes', 'AdminController@equipes'); // Liste des joueurs
Route::get('/admin/delete/equipes/{id_joueur}', 'AdminController@deleteEquipe'); // Suppression d'une equipe
// Route::get('/admin/create/joueurs', 'AdminController@getJoueurs'); // Formulaire de création d'une equipe
// Route::post('/admin/create/joueurs', 'AdminController@postJoueurs'); // Création d'une equipe
// Route::get('/admin/edit/joueurs/{id_joueur}', 'AdminController@getEditJoueurs'); // Formulaire de modification d'une equipe
// Route::post('/admin/edit/joueurs/{id_joueur}', 'AdminController@postEditJoueurs'); // Mdification d'une equipe


//Tournois
Route::get('/admin/tournois/inscrits', 'AdminController@listeInscrits'); // Liste des équipes inscrites pour la prochaine LAN

Route::get('/admin/tournois/create', 'AdminController@getTournois'); //Formulaire de création d'un tournois
Route::post('/admin/tournois/create', 'AdminController@postTournois'); // Création du tournois

Route::get('/admin/delete/tournois/{id_tournois}', 'AdminController@deleteTournois'); // Suppression d'un tournois
Route::get('/admin/edit/tournois/{id_tournois}', 'AdminController@getEditTournois'); // Formulaire de modification d'un tournois

Route::post('/admin/edit/tournois/{id_tournois}', 'AdminController@postEditTournois'); // Modification d'un tournois


//Articles
Route::get('/admin/articles', 'AdminController@articles'); // Liste d'articles

Route::get('/admin/articles/new', 'AdminController@getArticles'); // Formulaire d'écriture d'un article
Route::post('/admin/articles/new', 'AdminController@postArticles'); // Ecriture d'un article

Route::get('/admin/articles/{id_article}', 'AdminController@previewArticle'); // Preview d'un article

Route::get('/admin/articles/delete/{id_article}', 'AdminController@deleteArticle'); // Suppression d'un article

Route::get('/admin/articles/edit/{id_article}', 'AdminController@getEditArticle'); // Formulaire de modification d'un article
Route::post('/admin/articles/edit/{id_article}', 'AdminController@postEditArticle'); // Modification d'un article

//Partenaires
Route::get('/admin/partenaires', 'AdminController@partenaires'); // Liste des partenaires

Route::get('/admin/partenaires/new', 'AdminController@getPartenaire'); // Formulaires d'ajout de partenaire
Route::post('/admin/partenaires/new', 'AdminController@postPartenaire'); // Ajout de partenaire

Route::get('/admin/partenaires/edit/{id_partenaire}', 'AdminController@getEditPartenaire'); // Formulaires d'ajout de partenaire
Route::post('/admin/partenaires/edit/{id_partenaire}', 'AdminController@postEditPartenaire'); // Ajout de partenaire

Route::get('/admin/partenaires/delete/{id_partenaires}', 'AdminController@deletePartenaire'); // Suppression d'un partenaire


//Jeux
Route::get('/admin/jeux', 'JeuxController@index'); // Liste des jeux
Route::get('/admin/jeux/new', 'JeuxController@create'); // Formulaire ajout jeu
Route::post('/admin/jeux/new', 'JeuxController@store'); // Ajout jeu
Route::get('/admin/jeux/edit/{id_jeux}', 'JeuxController@edit'); // Formulaire modif jeu
Route::post('/admin/jeux/edit/{id_jeux}', 'JeuxController@update'); // Modif jeu
Route::get('/admin/jeux/delete/{id_jeux}', 'JeuxController@destroy'); // Supprime jeu


//Ranks
Route::get('/admin/ranks', 'RankController@index'); // Liste des ranks
Route::get('/admin/ranks/create', 'RankController@create'); // Formulaire ajout rank
Route::post('/admin/ranks/create', 'RankController@store'); // Ajout rank
Route::get('/admin/ranks/edit/{id_ranks}', 'RankController@edit'); // FFormulaire modif rank
Route::post('/admin/ranks/edit/{id_ranks}', 'RankController@update'); // Modif rank
Route::get('/admin/ranks/delete/{id_ranks}', 'RankController@destroy'); // Supprime rank