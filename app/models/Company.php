<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'contact_info'
    ];

    // Relationship: A company has many announcements
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}