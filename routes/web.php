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
Route::get('/articles/{id_article}', 'ArticleController@showHome'); // Affiche un article
Route::get('/reglement', 'HomeController@reglement');
Route::get('/infos', 'HomeController@infos');

/*
|--------------------------------------------------------------------------
| Joueurs
|--------------------------------------------------------------------------
*/
Route::resource('/joueurs', 'JoueurController', ['only' => ['index', 'show']]);
    
Route::middleware('auth')->group(function(){
        Route::get('/joueurs/{id}/edit', 'JoueurController@edit');
        Route::post('/joueurs/{id}', 'JoueurController@update');
        Route::get('/joueurs/{id}/joueur/{id_joueur}/delete', 'JoueurController@destroy');
});

/*
|--------------------------------------------------------------------------
| Equipes
|--------------------------------------------------------------------------
*/
Route::resource('/equipes', 'EquipeController', ['except' => ['destroy', 'update']]);

Route::middleware('auth')->group(function(){
    Route::post('/equipes/{id}', 'EquipeController@update');
    Route::get('/equipes/{id}/joueur/{id_joueur}/add', 'InscriptionController@ajoutJoueur');
    Route::get('/equipes/{id}/joueur/{id_joueur}/delete', 'EquipeController@destroyJoueur');
});


/*
|--------------------------------------------------------------------------
| Tournois
|--------------------------------------------------------------------------
*/
Route::resource('/tournois', 'TournoisController', ['index', 'show']);

Route::middleware('auth')->group(function(){
    Route::get('/tournois/{id_tournois}/equipe/{id_equipe}/inscription', 'TournoisController@update');
    Route::get('/tournois/{id_tournois}/equipe/{id_equipe}/delete', 'TournoisController@destroy');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->middleware('admin')->namespace('Admin')->group(function(){
    
    Route::get('/', 'AdminController@index'); //Page d'accueil du panel admin
    
    
    //Joueurs
    Route::get('/joueurs', 'AdminController@joueurs'); // Liste des joueurs
    
    Route::get('/delete/joueurs/{id_joueur}', 'AdminController@deleteJoueurs'); // Suppression dun joueur
    
    Route::get('/create/joueurs', 'AdminController@getJoueurs'); // Formulaire de création d'un joueur
    Route::post('/create/joueurs', 'AdminController@postJoueurs'); // Création d'un joueur
    
    Route::get('/edit/joueurs/{id_joueur}', 'AdminController@getEditJoueurs'); // Formulaire de modification d'un joueur
    Route::post('/edit/joueurs/{id_joueur}', 'AdminController@postEditJoueurs'); // Mdification d'un joueur


    Route::get('/equipes', 'AdminController@equipes'); // Liste des joueurs
    Route::get('/equipes/{id_joueur}/delete', 'EquipeController@destroy'); // Suppression d'une equipe

    Route::get('/tournois', 'AdminController@tournois'); // Liste des tournois 
    Route::get('/tournois/inscrits', 'AdminController@listeInscrits'); // Liste des équipes inscrites pour la prochaine LAN
    Route::get('/tournois/create', 'AdminController@getTournois'); //Formulaire de création d'un tournois
    Route::post('/tournois/create', 'AdminController@postTournois'); // Création du tournois
    Route::get('/delete/tournois/{id_tournois}', 'AdminController@deleteTournois'); // Suppression d'un tournois
    Route::get('/edit/tournois/{id_tournois}', 'AdminController@getEditTournois'); // Formulaire de modification d'un tournois
    Route::post('/edit/tournois/{id_tournois}', 'AdminController@postEditTournois'); // Modification d'un tournois


    /*
    |--------------------------------------------------------------------------
    | Articles
    |--------------------------------------------------------------------------
    */
    Route::resource('/articles', 'ArticleController', ['except' =>[
        'update', 'destroy'
    ]]);
    Route::post('/articles/{id_article}/edit', 'ArticleController@update');
    Route::get('/articles/{id_article}/delete', 'ArticleController@destroy');
    
    
    /*
    |--------------------------------------------------------------------------
    | Partenaires
    |--------------------------------------------------------------------------
    */
    Route::resource('/partenaires', 'PartenaireController', ['except' =>[
        'update', 'destroy', 'show'
    ]]);
    Route::post('/partenaires/{id_partenaire}/edit', 'PartenaireController@update');
    Route::get('/partenaires/{id_partenaire}/delete', 'PartenaireController@destroy');
    
    
    /*
    |--------------------------------------------------------------------------
    | Jeux
    |--------------------------------------------------------------------------
    */
    Route::resource('/jeux', 'JeuController', ['except' =>[
        'update', 'destroy', 'show'
    ]]);
    Route::post('/jeux/{id_jeu}/edit', 'JeuController@update');
    Route::get('/jeux/{id_jeu}/delete', 'JeuController@destroy');
    
    
    /*
    |--------------------------------------------------------------------------
    | Ranks
    |--------------------------------------------------------------------------
    */
    Route::resource('/ranks', 'RankController', ['except' =>[
        'update', 'destroy', 'show'
    ]]);
    Route::post('/ranks/{id_rank}/edit', 'RankController@update');
    Route::get('/ranks/{id_rank}/delete', 'RankController@destroy');

});
