<?php

return [
    // Public Routes
    [
        'method' => 'GET',
        'uri' => '/',
        'handler' => 'HomeController@index'
    ],
    [
        'method' => 'GET',
        'uri' => '/home',
        'handler' => 'HomeController@index'
    ],

    // Auth Routes
    [
        'method' => 'GET',
        'uri' => '/login',
        'handler' => 'AuthController@showLogin'
    ],
    [
        'method' => 'POST',
        'uri' => '/login',
        'handler' => 'AuthController@login'
    ],
    [
        'method' => 'GET',
        'uri' => '/register',
        'handler' => 'AuthController@showRegister'
    ],
    [
        'method' => 'POST',
        'uri' => '/register',
        'handler' => 'AuthController@register'
    ],
    [
        'method' => 'GET',
        'uri' => '/logout',
        'handler' => 'AuthController@logout'
    ],

    // Admin Routes
    [
        'method' => 'GET',
        'uri' => '/admin/dashboard',
        'handler' => 'AdminController@dashboard'
    ],
    [
        'method' => 'GET',
        'uri' => '/admin/articles',
        'handler' => 'AdminController@articles'
    ],
    // Companies
    [
        'method' => 'GET',
        'uri' => '/admin/companies',
        'handler' => 'AdminController@companies'
    ],
    [
        'method' => 'GET',
        'uri' => '/admin/companies/create',
        'handler' => 'CompanyController@create'
    ], 
    [
        'method' => 'GET',
        'uri' => '/admin/companies/edit/{id}',
        'handler' => 'CompanyController@edit'
    ], 
    [
        'method' => 'POST',
        'uri' => '/admin/companies/update/{id}',
        'handler' => 'CompanyController@update'
    ], 
    [
        'method' => 'POST',
        'uri' => '/admin/companies/delete/{id}',
        'handler' => 'CompanyController@delete'
    ], 
    //Announcement
    [
        'method' => 'GET',
        'uri' => '/admin/announcements',
        'handler' => 'AnnouncementController@AdminAnnouncementsShow'
    ],
    [
        'method' => 'GET',
        'uri' => '/admin/announcements/create',
        'handler' => 'AnnouncementController@create'
    ],
    [
        'method' => 'POST',
        'uri' => '/admin/announcements/store',
        'handler' => 'AnnouncementController@store'
    ],

    // User Routes
    [
        'method' => 'GET',
        'uri' => '/user/announcements',
        'handler' => 'AnnouncementController@index'
    ],
    // [
    //     'method' => 'GET',
    //     'uri' => '/announcements/create',
    //     'handler' => 'AnnouncementController@create'
    // ],
    // [
    //     'method' => 'POST',
    //     'uri' => '/announcements',
    //     'handler' => 'AnnouncementController@store'
    // ],
    [
        'method' => 'GET',
        'uri' => '/announcements/{id}',
        'handler' => 'AnnouncementController@show'
    ],
    [
        'method' => 'GET',
        'uri' => '/user/articles/create',
        'handler' => 'UserController@create'
    ],
    [
        'method' => 'POST',
        'uri' => '/user/articles',
        'handler' => 'UserController@store'
    ],


    // Routes pour la gestion des utilisateurs
    [
        'method' => 'GET',
        'uri' => '/admin/users',
        'handler' => 'Admin\UserManagementController@index'
    ],

    [
        'method' => 'DELETE',
        'uri' => '/admin/users/{id}',
        'handler' => 'Admin\UserManagementController@delete'
    ]
    
]; 