<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeoAnalyzer extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'title',
        'description',
        'language',
        'loadtime',
        'codeToTxtRatio',
        'word_count',
        'keywords',
        'longTailKeywords',
        'headers',
        'links',
        'images',
        'domain_title',
        'domain_description',

    ];

    protected $casts = [
        'keywords'         => Json::class,
        'longTailKeywords' => Json::class,
        'headers'          => Json::class,
        'links'            => Json::class,
        'images'           => Json::class,
    ];

    /**
     * Get the user that owns the DnsDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts_relation()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
