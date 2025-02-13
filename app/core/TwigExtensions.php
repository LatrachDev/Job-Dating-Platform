<?php

namespace App\Core;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtensions extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('path', [$this, 'path'])
        ];
    }

    public function path($route)
    {
        // Définir les routes de base
        $routes = [
            'admin_dashboard' => '/admin/dashboard',
            'admin_companies' => '/admin/companies',
            'admin_announcements' => '/admin/announcements',
            'admin_users' => '/admin/users'
        ];

        return $routes[$route] ?? '/';
    }
} 