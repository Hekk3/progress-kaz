<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Requisite extends Model
{
    use Translatable;
    protected $translatable = ['text'];

    public static function getContent(){
        return self::select('text')->first();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('text', 'LIKE', "%{$keyword}%")
                ->select('id', 'text')
                ->first();
        }else {
            return self::whereTranslation('text', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'text')
                ->first();
        }
    }
}
