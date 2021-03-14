<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Slider extends Model
{
    const is_active = 1;
    const is_not_active = 0;

    use Translatable;
    protected $translatable = ['title','content'];

    public static function getAll(){
        return self::where('status', self::is_active)
            ->select('id', 'title', 'content', 'image', 'url', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
