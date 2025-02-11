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
    [
        'method' => 'GET',
        'uri' => '/admin/articles/create',
        'handler' => 'AdminController@create'
    ],
    [
        'method' => 'POST',
        'uri' => '/admin/articles',
        'handler' => 'AdminController@store'
    ],
    [
        'method' => 'POST',
        'uri' => '/admin/articles/delete',
        'handler' => 'AdminController@delete'
    ],
    [
        'method' => 'POST',
        'uri' => '/admin/delete-article',
        'handler' => 'AdminController@deleteArticle'
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
    // [
    //     'method' => 'GET',
    //     'uri' => '/announcements/{id}/edit',
    //     'handler' => 'AnnouncementController@edit'
    // ],
    // [
    //     'method' => 'POST',
    //     'uri' => '/announcements/{id}',
    //     'handler' => 'AnnouncementController@update'
    // ],
    // [
    //     'method' => 'POST',
    //     'uri' => '/announcements/{id}/delete',
    //     'handler' => 'AnnouncementController@delete'
    // ]
]; 