<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'alexa_rank',
        'alexa_country',
        'alexa_country_code',
        'alexa_country_rank',
        'sitejabber_ranking',
        'trustpilot_ranking',
        'zoutons_ranking',
        'mywot_ranking',
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
