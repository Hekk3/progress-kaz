<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Production extends Model
{
    use Translatable;
    protected $translatable = ['first_content', 'second_content', 'second_list_a', 'second_list_b', 'second_list_c'];

    public static function getContent(){
        return self::select('first_content', 'second_content', 'second_image', 'second_list_a',
            'second_list_b', 'second_list_c')
            ->first();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('first_content', 'LIKE', "%{$keyword}%")
                ->orWhere('second_content', 'LIKE', "%{$keyword}%")
                ->select('first_content', 'second_content')
                ->first();
        }else {
            return self::whereTranslation('first_content', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('first_content', 'second_content')
                ->first();
        }
    }
}
