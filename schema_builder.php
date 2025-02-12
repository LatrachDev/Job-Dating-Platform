<?php
    
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables first
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . '/config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Config\Database;

// Initialize the database connection
Database::init();

// Create tables only if database connection is successful
try {
    if (!Capsule::schema()->hasTable('users')) {
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->timestamps();
        });
        echo "\n✅ Users table created successfully!";
    }

    if (!Capsule::schema()->hasTable('companies')) {
        Capsule::schema()->create('companies', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description');
            $table->text('contact_info');
            $table->timestamps();
        });
        echo "\n✅ Companies table created successfully!";
    }

    if (!Capsule::schema()->hasTable('announcements')) {
        Capsule::schema()->create('announcements', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->softDeletes();
        });
        echo "\n✅ Announcements table created successfully!";
    }
} catch (Exception $e) {
    die("\n❌ Error creating tables: " . $e->getMessage());
}
