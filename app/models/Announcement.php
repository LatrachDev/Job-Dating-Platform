<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use SoftDeletes;

    protected $table = 'announcements';
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
