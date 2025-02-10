<?php

require 'vendor/autoload.php'; // Charger les dépendances Composer

use App\Config\Database;
use Dotenv\Dotenv;

// Charger les variables d'environnement depuis `.env`
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialiser la connexion à la base de données
Database::init();
