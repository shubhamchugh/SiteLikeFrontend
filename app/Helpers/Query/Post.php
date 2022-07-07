<?php

use App\Models\Post;

if (!function_exists('alternative_data')) {
    function alternative_data($domain)
    {
        $post_details = Post::where('slug', $domain)
            ->where('status', 'publish')
            ->with(
                'ip_record_relation',
                'seo_analyzers_relation',
            )
            ->first();

        return $post_details;
    }
}
