<?php

use Illuminate\Database\Capsule\Manager as Capsule;

try {
    Capsule::schema()->table('announcements', function ($table) {
        $table->softDeletes();
    });
    echo "\n✅ Added soft deletes to announcements table successfully!";
} catch (Exception $e) {
    die("\n❌ Error adding soft deletes: " . $e->getMessage());
} 