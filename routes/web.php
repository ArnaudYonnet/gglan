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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/rules', 'HomeController@rules')->name('rules');
Route::resource('posts', 'PostController')->only('show');


// Players
    Route::post('players/search', 'SearchController@players');
    Route::get('players/teams', 'PlayerController@teams')->middleware('auth');
    Route::post('players/{player}/game', 'PlayerController@addGame');
    Route::delete('players/{player}/game', 'PlayerController@deleteGame');
    Route::post('players/{player}/rank', 'PlayerController@addRank');
    Route::resource('players', 'PlayerController');


// Teams
    Route::post('teams/joinrequest', 'TeamController@joinrequest');
    Route::put('teams/decision', 'TeamController@decisionJoinrequest');
    Route::delete('teams/leave', 'PlayerController@leaveTeam');
    Route::post('teams/search', 'SearchController@teams');
    Route::delete('teams/{team}/deleteMate', 'TeamController@deleteMate');
    Route::resource('teams', 'TeamController');


// Tournaments
    Route::put('tournaments/register', 'TournamentController@register');
    Route::delete('tournaments/unregister', 'TournamentController@unregister');
    Route::resource('tournaments', 'TournamentController');


// Admin Auth
    Route::prefix('admin')->namespace('Auth')->group(function()
    {
        Route::get('login', 'AdminLoginController@showLoginForm')->name('admin.login'); 
        Route::post('login', 'AdminLoginController@login')->name('admin.login.submit'); 
        Route::get('logout', 'AdminLoginController@logout')->name('admin.logout'); 
    });


// Admin Settings
    Route::prefix('admin')->middleware('admin')->namespace('Admin')->group(function() 
    {
        Route::get('/settings', 'HomeController@settings')->name('admin.settings');
        Route::post('/settings', 'HomeController@update');
    });

// Admin Dashboard
    Route::prefix('admin')->middleware(['admin', 'checkRole'])->namespace('Admin')->group(function() 
    {
        Route::get('/', 'HomeController@index')->name('admin.dashboard');
        
        // Admins
        Route::resource('admins', 'AdminController', ['as' => 'admin'])->except(['show', 'create', 'edit']);
        Route::resource('roles', 'RoleController', ['as' => 'admin'])->except(['show', 'create', 'edit']);

        // Players
        Route::resource('users', 'UserController', ['as' => 'admin'])->except(['show', 'create', 'edit']);
        Route::resource('teams', 'TeamController', ['as' => 'admin'])->except(['show', 'create', 'edit']);

        // Tournaments
        Route::resource('tournaments', 'TournamentController', ['as' => 'admin'])->except(['show', 'create', 'edit']);
        Route::resource('games', 'GameController', ['as' => 'admin'])->except(['show', 'create', 'edit']);
        Route::resource('ranks', 'RankController', ['as' => 'admin'])->except(['show', 'create', 'edit']);

        // Organisation
        Route::resource('meetings', 'MeetingController', ['as' => 'admin'])->except(['show', 'create']);
        Route::resource('posts', 'PostController', ['as' => 'admin'])->except(['show', 'create']);
        Route::resource('partners', 'PartnerController', ['as' => 'admin'])->except(['show', 'create', 'edit']);

        Route::get('rules', 'RuleController@show')->name('admin.rules.show');
        Route::put('rules/{rule}', 'RuleController@update')->name('admin.rules.update');

        Route::get('queues', 'QueueController@index')->name('admin.queues.index');
        Route::post('queues/deleteAll', 'QueueController@deleteAll')->name('admin.queues.deleteAll');
    });
