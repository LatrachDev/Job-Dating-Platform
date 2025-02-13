<?php

require_once __DIR__ . '/../../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// Initialize database connection
require_once __DIR__ . '/../../config/database.php';
use App\Config\Database;
use Illuminate\Database\Capsule\Manager as Capsule;

// Initialize the database connection
Database::init();




try {
    Capsule::schema()->table('announcements', function ($table) {
        $table->softDeletes();
    });
    echo "\n✅ Added soft deletes to announcements table successfully!";
} catch (Exception $e) {
    die("\n ❌ Error adding soft deletes: " . $e->getMessage());
} 