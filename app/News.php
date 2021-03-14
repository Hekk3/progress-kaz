<?php

namespace App;

use App\Page\IPage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Traits\Translatable;


class News extends Model implements IPage
{
    const is_news = 1;
    const is_article = 2;

    use Translatable;
    protected $translatable = ['name','short_description','first_block', 'second_block', 'third_block',
        'meta_title','meta_description','meta_keyword'];

    public static function getByID($id){
        return self::select('id', 'name', 'sliders', 'first_block', 'second_block', 'third_block')
            ->find($id);
    }

    public static function getAll($type = null){

        $data = self::getFilteredData($type);
        return $data->orderBy('news.created_at', 'DESC')->get();
    }

    public static function search($keyword, $type = null){


        $data = self::getFilteredData($type);

        if(app()->isLocale('ru')) {
            return $data->where('news.name', 'LIKE', "%{$keyword}%")
                ->orWhere('news.short_description', 'LIKE', "%{$keyword}%")
                ->orderBy('news.created_at', 'DESC')
                ->get();
        }else {
            return $data->whereTranslation('news.short_description', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->orderBy('news.created_at', 'DESC')
                ->get();
        }
    }

    private static function getFilteredData($type){

        $status = NewsList::getContent()->status;
        $time_interval = NewsOption::getActive();

        if($status == 1){
            $data = self::whereNotExists(function($query){
                $query->select(DB::raw(1))
                    ->from('news_list_news')
                    ->whereRaw('news_list_news.news_id = news.id')
                    ->groupBy('news_list_news.news_id');
            })
                ->select('news.id', 'news.name', 'news.image', 'news.short_description', 'news.status', 'news.created_at');

        }else{
            $data = self::select('id', 'name', 'image', 'short_description', 'status', 'created_at');
        }

        $check = true;
        foreach ($time_interval as $v){
            if($check){
                $check = false;
                $data = $data->whereBetween('news.created_at', [$v->from_date, $v->to_date]);
            }else{
                $data = $data->orWhere(function ($query) use ($v) {
                    $query->where('news.created_at', '<=', $v->to_date);
                    $query->where('news.created_at', '>=', $v->from_date);
                });
            }
        }

        if($type == 'news'){
            $data = $data->where('news.status', self::is_news);
        }elseif($type == 'article'){
            $data = $data->where('news.status', self::is_article);
        }

        return $data;
    }

}
