<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SummarySpecificationSlider extends Model
{
    public static function getAll(){
        return self::select('id', 'image', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
