<?php

namespace App\Models;

use App\Models\IpRecord;
use App\Models\Attribute;
use App\Models\DnsDetail;
use App\Models\Technology;
use App\Models\SeoAnalyzer;
use App\Models\WhoIsRecord;
use App\Models\SslCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'ip',
        'status',
        'post_type',
        'up_down',
        'thumbnail',
        'favicon',
        'content',
        'page_views',
        'is_index_google',
        'is_index_bing',
        'is_wappalyzer',
        'is_ssl',
        'is_alexa',
        'is_seo_analyzer',
        'is_whois',
        'is_dns',
        'is_ip_location',
        'is_screenshot',
    ];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'technology_post_relations');
    }

    public function DnsDetails_relation()
    {
        return $this->hasOne(DnsDetail::class, 'post_id', 'id');
    }

    public function Ssl_Details_relation()
    {
        return $this->hasOne(SslCertificate::class, 'post_id', 'id');
    }

    public function who_is_relation()
    {
        return $this->hasOne(WhoIsRecord::class, 'post_id', 'id');
    }

    public function ip_record_relation()
    {
        return $this->hasOne(IpRecord::class, 'post_id', 'id');
    }

    public function attributes_relation()
    {
        return $this->hasOne(Attribute::class, 'post_id', 'id');
    }

    public function seo_analyzers_relation()
    {
        return $this->hasOne(SeoAnalyzer::class, 'post_id', 'id');
    }

    public function domain_alternative()
    {
        return $this->belongsToMany(SELF::class, 'post_alternatives', 'post_id', 'post_alternate_id');
    }
}
