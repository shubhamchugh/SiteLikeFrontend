<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DnsDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'A',
        'AAAA',
        'CNAME',
        'NS',
        'SOA',
        'MX',
        'SRV',
        'TXT',
        'CAA',
        'post_id',
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
