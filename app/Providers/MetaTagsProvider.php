<?php

namespace App\Providers;

use App\Helpers\TranslatesCollection;
use App\Page\Page;
use App\Page as PageModel;
use App\Product as ProductModel;
use App\Category as CategoryModel;
use App\News as NewsModel;
use App\Vacancy as VacancyModel;
use App\Manufacturer as ManufacturerModel;
use App\Meta\MetaTag;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class MetaTagsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */


    protected $page;

    public function register()
    {
        $this->app->singleton(MetaTag::class, function ($app) {
            return new MetaTag(config('app.meta'));
        });

        $this->app->singleton(Page::class, function ($app) {
            return new Page();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(MetaTag $meta, Page $page)
    {
        $pageInstance = PageModel::getByUrl(Request::segment(1));
        $productInstance = ProductModel::find(Request::segment(2));
        $categoryInstance = CategoryModel::find(Request::segment(2));
        $newsInstance = NewsModel::find(Request::segment(2));
        $vacancyInstance = VacancyModel::find(Request::segment(2));
        $manufacturer = ManufacturerModel::find(Request::segment(2));
        $instance = null;

        if($productInstance && Request::segment(1) == "product"){
            $instance = $productInstance;
        }elseif($manufacturer && Request::segment(1) == "manufacturer"){
            $instance = $manufacturer;
        }elseif($categoryInstance && Request::segment(1) == "catalogs"){
            $instance = $categoryInstance;
        }elseif($newsInstance && Request::segment(1) == "blogs"){
            $instance = $newsInstance;
        }elseif($vacancyInstance && Request::segment(1) == "vacancies"){
            $instance = $vacancyInstance;
        }else if($pageInstance) {
            $instance = $pageInstance;
        }

        if($instance != null){
            $page->setPage($instance);
            if($instance->meta_title){
                TranslatesCollection::translate($instance, app()->getLocale());
                $meta->setTitle($instance->meta_title);
                $meta->setDescription($instance->meta_description);
                $meta->setKeyword($instance->meta_keyword);
            }
        }

        $page->setMeta($meta);
    }
}
