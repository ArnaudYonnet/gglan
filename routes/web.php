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
Route::resource('/equipes', 'EquipeController', ['only' => 'index']);
    

Route::middleware('auth')->group(function(){
    Route::resource('/equipes', 'EquipeController', ['except' =>[
            'index', 'update', 'destroy'
        ]]);
    
    Route::post('/equipes/{id}/edit', 'EquipeController@update');
    Route::get('/equipes/{id}/delete', 'EquipeController@destroy');
});


/*
|--------------------------------------------------------------------------
| Tournois
|--------------------------------------------------------------------------
*/
Route::get('/tournois', 'TournoisController@index'); // Les anciens tournois
Route::get('/tournois/inscription/{id}', 'TournoisController@inscription'); // Inscription équipe au prochain tournois

Route::get('/test', function() {
        // $equipe = \App\User::find(Auth::id())->getEquipe();
        $isInscrit = \App\Equipe::find(1)->isInscrit();
        if ($isInscrit) 
        {
            return "Equipe inscrite !";
        }
        return "Equipe non-inscrite";
});
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->middleware('admin')->group(function(){
    
    Route::get('/', 'AdminController@index'); //Page d'accueil du panel admin
    
    
    //Joueurs
    Route::get('/joueurs', 'AdminController@joueurs'); // Liste des joueurs
    
    Route::get('/delete/joueurs/{id_joueur}', 'AdminController@deleteJoueurs'); // Suppression dun joueur
    
    Route::get('/create/joueurs', 'AdminController@getJoueurs'); // Formulaire de création d'un joueur
    Route::post('/create/joueurs', 'AdminController@postJoueurs'); // Création d'un joueur
    
    Route::get('/edit/joueurs/{id_joueur}', 'AdminController@getEditJoueurs'); // Formulaire de modification d'un joueur
    Route::post('/edit/joueurs/{id_joueur}', 'AdminController@postEditJoueurs'); // Mdification d'un joueur


    Route::get('/equipes', 'AdminController@equipes'); // Liste des joueurs
    Route::get('/delete/equipes/{id_joueur}', 'AdminController@deleteEquipe'); // Suppression d'une equipe

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
