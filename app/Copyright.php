<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Copyright extends Model
{
    use Translatable;
    protected $translatable = ['text'];

    public static function getContent(){
        return self::select('text')->first();
    }
}
