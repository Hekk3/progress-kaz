<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Map extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];

    public static function getAll(){
        return self::select('id', 'name', 'image', 'description')->get();
    }
}
