<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Manager extends Model
{
    use Translatable;
    protected $translatable = ['title', 'fio'];

    public static function getAll(){
        return self::select('id', 'title', 'fio', 'first_phone', 'second_phone', 'email', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('title', 'LIKE', "%{$keyword}%")
                ->select('id', 'title', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('title', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'title', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }
}
