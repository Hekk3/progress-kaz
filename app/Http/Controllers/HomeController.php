<?php


namespace App\Http\Controllers;


use App\Banner;
use App\Copyright;
use App\Helpers\TranslatesCollection;
use App\Map;
use App\News;
use App\Slider;
use App\SiteLink;

class HomeController extends Controller
{
    public function index(){

        $sliders = Slider::getAll();
        $banners = Banner::getAll();
        $maps = Map::getAll();
        $copyright = Copyright::getContent();
        $news = News::getAll('news');

        TranslatesCollection::translate($sliders, app()->getLocale());
        TranslatesCollection::translate($maps, app()->getLocale());
        TranslatesCollection::translate($copyright, app()->getLocale());
        TranslatesCollection::translate($news, app()->getLocale());

        return view('home.index', compact('sliders', 'banners', 'maps', 'copyright', 'news'));
    }

    public function sitemap(){
        $sitelinks = SiteLink::with(['childs.childs'])->where('parent_id',null)->get();
        return view('sitemap.index',['sitelinks' => $sitelinks]);
    }
}