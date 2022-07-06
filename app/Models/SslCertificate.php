<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SslCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'issuer',
        'getSignatureAlgorithm',
        'getOrganization',
        'getAdditionalDomains',
        'getFingerprint',
        'getFingerprintSha256',
        'validFromDate',
        'expirationDate',
        'isValid',
    ];

    protected $casts = [
        'validFromDate'        => 'datetime',
        'expirationDate'       => 'datetime',
        'getAdditionalDomains' => Json::class,
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
