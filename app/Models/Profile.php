<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'bio',
        'phone',
        'avatar',
        'address',
        'linkedin',
        'github',
        'website',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
