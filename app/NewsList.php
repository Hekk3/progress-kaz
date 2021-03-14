<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NewsList extends Model
{
    public static function getContent(){
        return self::first();
    }
}
