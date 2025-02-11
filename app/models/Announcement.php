<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'company_id'
    ];

    // Relationship: An announcement belongs to a company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
