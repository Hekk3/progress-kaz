<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class FrameConnectionType extends Model
{
    use Translatable;
    protected $translatable = ['content'];

    public static function getContent(){
        return self::select('content', 'images')->first();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('content', 'LIKE', "%{$keyword}%")
                ->select('content')
                ->first();
        }else {
            return self::whereTranslation('content', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('content')
                ->first();
        }
    }
    
}
