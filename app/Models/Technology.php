<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
        'icon',
        'website',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'technology_post_relations');
    }
}
