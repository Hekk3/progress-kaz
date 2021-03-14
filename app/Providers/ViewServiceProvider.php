<?php

namespace App\Providers;


use App\Category;
use App\Helpers\TranslatesCollection;
use App\Page\Page;
use App\WorkingHour;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Page $page, WorkingHour $workingHour, Category $category)
    {

        View::composer('*', function($view) use($page) {
            $view->with(['page' => $page]);
        });

        View::composer('*', function($view) use($workingHour) {
            $workingHour = $workingHour::getContent();
            if($workingHour){
                TranslatesCollection::translate($workingHour, app()->getLocale());
                $view->with(['workingHour' => $workingHour]);
            }
        });


        View::composer('*', function($view) use($category) {
            $categories = $category::getCategories();
            if($categories){
                TranslatesCollection::translate($categories, app()->getLocale());
                $view->with(['g_categories' => $categories]);
            }
        });


    }
}
