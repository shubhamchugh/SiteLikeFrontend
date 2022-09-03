<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class PostPageController extends Controller
{
    public function index(Post $post)
    {
        if ('unpublish' == $post->status) {
            return abort(404);
        }

        $menusResponse = nova_get_menu_by_slug('header');
        $menus         = $menusResponse['menuItems'];

        $recent_update = Post::orderBy('updated_at', 'DESC')
            ->select('slug')
            ->where('post_type', 'listing')
            ->where('status', 'publish')
            ->limit(6)
            ->get();
        $top_visited = Post::orderBy('page_views', 'DESC')
            ->select('slug')
            ->where('post_type', 'listing')
            ->where('status', 'publish')
            ->limit(6)
            ->get();
        $recent_added = Post::orderBy('created_at', 'DESC')
            ->select('slug')
            ->where('post_type', 'listing')
            ->where('status', 'publish')
            ->limit(6)
            ->get();

        //  $post = $post->where('status', 'publish');

        $post->update([
            'page_views' => DB::raw('page_views + 1'),
        ]);

        $settings    = nova_get_settings();
        $alter_count = ($post->domain_alternative->count() == 0) ? "" : $post->domain_alternative->count();
      
        if (Config('value.theme_name') == 'portal-directory-manvendra') {
            $title       = (!empty($post->title)) ? $post->title : ($settings['title_prefix'] . ' ' . ucwords($post->slug) . ' ' . $settings['title_suffix']);
        }else{
            $title       = (!empty($post->title)) ? $post->title : ($alter_count . " " . $settings['title_prefix'] . ' ' . ucwords($post->slug) . ' ' . $settings['title_suffix']);
        }


        SEOTools::setTitle($title);
        SEOTools::setDescription(optional($post->seo_analyzers_relation)->domain_description);
        SEOTools::opengraph()->setUrl(URL::current());
        SEOMeta::addMeta('article:published_time', optional($post->updated_at)->toW3CString(), 'property');
        SEOTools::setCanonical(URL::current());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage("https://s3.us-west-1.wasabisys.com/" . config('filesystems.disks.wasabi.bucket') . "/scrape/thumbnail/" . $post->thumbnail);
        SEOMeta::setKeywords(optional($post->seo_analyzers_relation)->longTailKeywords);
        //SEO END FOR POST PAGE
        $theme_name = 'themes.'.Config('value.theme_name').'.content.post';
        return view(
            $theme_name,
            [
                'post'          => $post,
                'menus'         => $menus,
                'settings'      => $settings,
                'recent_update' => $recent_update,
                'top_visited'   => $top_visited,
                'recent_added'  => $recent_added,
                'alter_count'   => $alter_count,
            ]
        );
    }
}
