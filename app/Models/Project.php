<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
        'description',
        'tech_stack',
        'repo_url',
        'live_url',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
