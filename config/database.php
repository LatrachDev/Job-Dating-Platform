<?php

namespace App\Config;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    public static function init()
    {
        try {
            $config = [
                'driver'    => $_ENV['DB_CONNECTION'],
                'host'      => $_ENV['DB_HOST'],
                'port'      => $_ENV['DB_PORT'],
                'database'  => $_ENV['DB_DATABASE'],
                'username'  => $_ENV['DB_USERNAME'],
                'password'  => $_ENV['DB_PASSWORD'],
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ];

            $capsule = new Capsule;
            $capsule->addConnection($config);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            echo "✅ Connexion réussie à PostgreSQL via Eloquent!";
        } catch (\Exception $e) {
            die("❌ Erreur de connexion : " . $e->getMessage());
        }
    }
}
