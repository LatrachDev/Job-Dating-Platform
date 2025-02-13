<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

require_once __DIR__ . '/../../config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Config\Database;

Database::init();


try {
    Capsule::schema()->table('announcements', function ($table) {
        $table->string('thumbnail')->nullable()->after('description');
    });
}catch (Exception $e){
    die("\n Error adding thumbnail column: " . $e->getMessage());
}