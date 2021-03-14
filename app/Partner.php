<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Partner extends Model
{
    use Translatable;
    protected $translatable = ['name', 'full_description'];

    public static function getAll(){
        return self::select('id', 'name', 'image', 'full_description', 'background', 'sort', 'link')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('full_description', 'LIKE', "%{$keyword}%")
                ->select('id', 'name', 'full_description', 'sort', 'link')
                ->get();
        }else {
            return self::whereTranslation('name', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name', 'full_description', 'sort', 'link')
                ->get();
        }
    }
}
