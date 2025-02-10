<?php
    
    require_once __DIR__ . '/vendor/autoload.php';
    
    use Illuminate\Database\Capsule\Manager as Capsule;
    
    Capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('name', 50);
        $table->string('email')->unique();
        $table->string('password');
        $table->string('role')->default('user');
        $table->timestamps();
    });
    
    Capsule::schema()->create('companies', function ($table) {
        $table->increments('id');
        $table->string('name', 50);
        $table->text('description');
        $table->text('contact_info');
        $table->timestamps();
    });
    
    Capsule::schema()->create('announcements', function ($table) {
        $table->increments('id');
        $table->string('title', 50);
        $table->text('description');
        $table->string('date', 50);
        $table->timestamps();
        $table->softDeletes();
        $table->integer('company_id')->unsigned();
        $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
    });


