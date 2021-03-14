<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    public static function getAll(){
        return self::select('id', 'image', 'url')->get();
    }
}
