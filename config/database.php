<?php

namespace App\Config;

use Illuminate\Database\Capsule\Manager as Capsule;
use Exception;

class Database {
    public static function init()
    {
        try {
            $config = [
                'driver'    => $_ENV['DB_CONNECTION'] ?? 'pgsql',
                'host'      => $_ENV['DB_HOST'] ?? '127.0.0.1',
                'port'      => $_ENV['DB_PORT'] ?? '5432',
                'database'  => $_ENV['DB_DATABASE'] ?? 'test',
                'username'  => $_ENV['DB_USERNAME'] ?? 'root',
                'password'  => $_ENV['DB_PASSWORD'] ?? '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ];

            $capsule = new Capsule;
            $capsule->addConnection($config);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            // 🔹 Tester immédiatement la connexion
            $capsule->getConnection()->getPdo();

            echo "✅ Connexion réussie à PostgreSQL via Eloquent!";
            
        } catch (Exception $e) {
            die("❌ Erreur de connexion : " . $e->getMessage());
        }
    }
}
