<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'published', 
        'author',
        'image',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('created_at');
    }
}
