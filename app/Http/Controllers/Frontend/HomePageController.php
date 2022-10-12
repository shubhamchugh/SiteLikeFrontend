<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Artesaos\SEOTools\Facades\SEOTools;

class HomePageController extends Controller
{
    public function index()
    {
        $posts = Post::with(
            'seo_analyzers_relation',
            'ip_record_relation',
            'Ssl_Details_relation'
        )
            ->where('post_type', 'listing')
            ->where('status', 'publish')
            ->orderBy('id', 'ASC')
            ->simplePaginate(10);

        if (empty($posts->first())) {
            return "<h1>Please do some scrape to get data</h1>";
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
        $settings = nova_get_settings();

        $home_title            = (!empty($settings['home_title'])) ? $settings['home_title'] : "Home Page";
        $home_page_description = (!empty($settings['home_page_description'])) ? $settings['home_page_description'] : "";
        //SEO FOR HOME PAGE
        SEOTools::setTitle($home_title . ' | Page' . $posts->currentPage());
        SEOTools::setDescription($home_page_description);
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical(URL::current());
        SEOTools::opengraph()->addProperty('type', 'article');


        $theme_name = 'themes.'.Config('value.theme_name').'.content.home';

        return view($theme_name, [
            'posts'         => $posts,
            'menus'         => $menus,
            'recent_update' => $recent_update,
            'top_visited'   => $top_visited,
            'recent_added'  => $recent_added,
        ]);
    }
}
