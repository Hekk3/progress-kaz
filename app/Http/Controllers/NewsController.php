<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27.05.2020
 * Time: 17:24
 */

namespace App\Http\Controllers;


use App\Copyright;
use App\Helpers\TranslatesCollection;
use App\News;

class NewsController extends Controller
{
    public function index($id){

        $model = News::getByID($id);
        if($model){
            TranslatesCollection::translate($model, app()->getLocale());
            return view('blogs.index', compact('model'));
        }else{
            abort(404);
        }
    }

    public function all(){

        $model = News::getAll();
        $copyright = Copyright::getContent();

        TranslatesCollection::translate($model, app()->getLocale());
        TranslatesCollection::translate($copyright, app()->getLocale());

        return view('blogs.all', compact('model', 'copyright'));
    }
}
