<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAlternative extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'post_alternate_id',
    ];
    
    public function posts_relation()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function posts_alternative_relation()
    {
        return $this->belongsTo(Post::class, 'post_alternate_id', 'id');
    }
}
