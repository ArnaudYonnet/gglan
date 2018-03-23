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
    
    //Home
    Route::get('/', 'HomeController@index');
    
    //Joueurs
    Route::resource('/joueurs', 'JoueurController', ['only' => ['index', 'edit', 'store']]);
    Route::post('/joueurs/{id}', 'JoueurController@update');
    Route::get('/joueurs/{id}/delete', 'JoueurController@destroy');

    //Equipes
    Route::resource('/equipes', 'EquipeController', ['only' => ['index', 'edit', 'store']]);
    Route::post('/equipes/{id}', 'EquipeController@update');
    Route::get('/equipes/{id}/delete', 'EquipeController@destroy');

    //Tournois
    Route::resource('/tournois', 'TournoisController', ['only' => ['index', 'edit', 'store']]);
    Route::post('/tournois/{id}', 'TournoisController@update');
    Route::get('/tournois/{id}/delete', 'TournoisController@destroy');

    //Jeux
    Route::resource('/jeux', 'JeuController', ['only' => ['index', 'edit', 'store']]);
    Route::post('/jeux/{id}/edit', 'JeuController@update');
    Route::get('/jeux/{id}/delete', 'JeuController@destroy');
    
    //Ranks
    Route::resource('/ranks', 'RankController', ['only' => ['index', 'edit', 'store']]);
    Route::post('/ranks/{id}/edit', 'RankController@update');
    Route::get('/ranks/{id}/delete', 'RankController@destroy');

    //Articles
    Route::resource('/articles', 'ArticleController', ['except' => ['update', 'destroy']]);
    Route::post('/articles/{id}/edit', 'ArticleController@update');
    Route::get('/articles/{id}/delete', 'ArticleController@destroy');
    
    //Partenaires
    Route::resource('/partenaires', 'PartenaireController', ['only' => ['index', 'edit', 'store']]);
    Route::post('/partenaires/{id}/edit', 'PartenaireController@update');
    Route::get('/partenaires/{id}/delete', 'PartenaireController@destroy');
});

