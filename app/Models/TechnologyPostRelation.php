<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechnologyPostRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'technology_id',
        'confidence',
        'version',
    ];

    public function posts_relation()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function technologies_relation()
    {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }
}
