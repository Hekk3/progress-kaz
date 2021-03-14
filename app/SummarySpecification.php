<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class SummarySpecification extends Model
{
    use Translatable;
    protected $translatable = ['title', 'content'];

    public static function getAll(){
        return self::select('id', 'title', 'content', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('content', 'LIKE', "%{$keyword}%")
                ->select('id', 'title', 'content', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('title', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'title', 'content', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }
}
