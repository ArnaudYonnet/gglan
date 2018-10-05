<?php

return [

    // Association role & page
    'pageRole' => [
        
        // Dashboard
        'dashboard' => [
            'role' => 'dashboard',
            'route' => 'admin.dashboard',
        ],

        // Players
        'players' => [
            'role' => 'players',
            'route' => 'admin.users',
        ],

        // Teams
        'teams' => [
            'role' => 'players',
            'route' => 'admin.teams',
        ],

        // Admins
        'admins' => [
            'role' => 'admins',
            'route' => 'admin.admins',
        ],

        // Roles
        'roles' => [
            'role' => 'admins',
            'route' => 'admin.roles',
        ],

        // Games
        'games' => [
            'role' => 'tournaments',
            'route' => 'admin.games',
        ],

        // Games
        'ranks' => [
            'role' => 'tournaments',
            'route' => 'admin.ranks',
        ],

        // Tournaments
        'tournaments' => [
            'role' => 'tournaments',
            'route' => 'admin.tournaments',
        ],

        // Meetings
        'meetings' => [
            'role' => 'meetings',
            'route' => 'admin.meetings',
        ],

        // Posts
        'posts' => [
            'role' => 'posts',
            'route' => 'admin.posts',
        ],

        // Partners
        'partners' => [
            'role' => 'partners',
            'route' => 'admin.partners',
        ],

        // Rules
        'rules' => [
            'role' => 'admins',
            'route' => 'admin.rules',
        ],

        // Queues
        'queues' => [
            'role' => 'admins',
            'route' => 'admin.queues',
        ],
    ]

];