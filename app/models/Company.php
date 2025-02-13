<?php

namespace App\Models;

use App\Config\Database;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'description',
        'contact_info'
    ];


    protected static function boot()
    {
        parent::boot();
        
        static::deleting(function($company) {
            $company->announcements()->delete();
        });
    }

    // Relationship: A company has many announcements
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}