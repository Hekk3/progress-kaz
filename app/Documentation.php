<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Documentation extends Model
{
    use Translatable;
    protected $translatable = ['name'];

    public static function getAllByProduct($id){
        return self::select('id', 'name', 'image', 'file', 'sort')
            ->where('product_id', $id)
            ->orderBy('sort', 'ASC')
            ->get();
    }
}
