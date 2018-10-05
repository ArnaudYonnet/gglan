<?php

return [

    // Dashboard
    'dashboard' => [
        'group' => 0,
        'name' => 'Dashboard',
        'icon' => 'fas fa-home',
        'url' => '/admin',
    ],

    // Players Manager [Players & Teams]
    'players' => [
        'group' => 1,
        'name' => 'Players',
        'icon' => 'fas fa-users',
        
        'items' => [
            [
                'name' => 'Players',
                'icon' => 'fas fa-user',
                'url' => '/admin/users',
            ],

            [
                'name' => 'Teams',
                'icon' => 'fas fa-users',
                'url' => '/admin/teams',
            ],
        ],
    ],

    // Tournaments Manager [Tournaments & Games & Ranks]
    'tournaments' => [
        'group' => 1,
        'name' => 'Tournaments',
        'icon' => 'fas fa-trophy',
        
        'items' => [
            [
                'name' => 'Tournaments',
                'icon' => 'fas fa-trophy',
                'url' => '/admin/tournaments',
            ],

            [
                'name' => 'Games',
                'icon' => 'fas fa-gamepad',
                'url' => '/admin/games',
            ],

            [
                'name' => 'Ranks',
                'icon' => 'fas fa-angle-double-up',
                'url' => '/admin/ranks',
            ],
        ],
    ],
    
    // Meetings Manager
    'meetings' => [
        'group' => 0,
        'name' => 'Meetings',
        'icon' => 'fas fa-comments',
        'url' => '/admin/meetings',
    ],

    // Posts Manager
    'posts' => [
        'group' => 0,
        'name' => 'Posts',
        'icon' => 'fas fa-newspaper',
        'url' => '/admin/posts',
    ],

    // Partners Manager
    'partners' => [
        'group' => 0,
        'name' => 'Partners',
        'icon' => 'fas fa-handshake',
        'url' => '/admin/partners',
    ],

    // Partners Manager
    'rules' => [
        'group' => 0,
        'name' => 'Rules',
        'icon' => 'fas fa-registered',
        'url' => '/admin/rules',
    ],

    // Admins Manager [Roles & Admins]
    'admins' => [
        'group' => 1,
        'name' => 'Admins',
        'icon' => 'fas fa-users',
        
        'items' => [
            [
                'name' => 'Admins',
                'icon' => 'fas fa-user-circle',
                'url' => '/admin/admins',
            ],
            
            [
                'name' => 'Roles',
                'icon' => 'fas fa-user-secret',
                'url' => '/admin/roles',
            ],
        ],
    ],

    // Queues Manager
    'queues' => [
        'group' => 0,
        'name' => 'Queues',
        'icon' => 'fas fa-stopwatch',
        'url' => '/admin/queues',
    ],

];