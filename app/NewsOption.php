<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NewsOption extends Model
{
    const is_active = 1;
    const is_not_active = 0;

    public static function getActive(){
        return self::where('status', self::is_active)->get();
    }
}
