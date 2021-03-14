<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class CoatingForFrame extends Model
{
    use Translatable;
    protected $translatable = ['text_left', 'text_right', 'text_bottom', 'title_images'];

    public static function getContent(){
        return self::select('text_left', 'text_right', 'text_bottom', 'title_images', 'images')->first();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('text_left', 'LIKE', "%{$keyword}%")
                ->orWhere('text_right', 'LIKE', "%{$keyword}%")
                ->select('text_left', 'text_right')
                ->first();
        }else {
            return self::whereTranslation('text_left', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('text_left', 'text_right')
                ->first();
        }
    }

}
