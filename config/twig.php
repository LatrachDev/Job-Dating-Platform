<?php

namespace Config;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            // Create the loader - point it to your views directory in app folder
            $loader = new FilesystemLoader(__DIR__ . '/../app/views');
            
            // Create Twig environment
            self::$instance = new Environment($loader, [
                'cache' => __DIR__ . '/../cache/twig',
                'auto_reload' => true, // Set to false in production
                'debug' => true // Set to false in production
            ]);
        }
        return self::$instance;
    }
}
