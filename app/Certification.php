<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Certification extends Model
{
    use Translatable;
    protected $translatable = ['description'];

    public static function getAll(){
        return self::select('id', 'image','imageDop', 'description', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('description', 'LIKE', "%{$keyword}%")
                ->select('id', 'image','imageDop', 'description', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('description', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'image','imageDop', 'description', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }
}
