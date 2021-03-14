<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Project extends Model
{
    use Translatable;
    protected $translatable = ['name', 'short_description', 'full_description'];

    public static function getAll(){
        return self::select('id', 'name', 'images', 'short_description', 'full_description', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function search($keyword){
        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('short_description', 'LIKE', "%{$keyword}%")
                ->select('id', 'name','images', 'short_description', 'sort')
                ->get();
        }else {
            return self::whereTranslation('short_description', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name','images', 'short_description', 'sort')
                ->get();
        }
    }
}
