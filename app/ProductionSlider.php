<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class ProductionSlider extends Model
{
    use Translatable;
    protected $translatable = ['description'];

    public static function getAll(){
        return self::select('id', 'image', 'description', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
