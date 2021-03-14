<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class IndustryApplication extends Model
{
    use Translatable;
    protected $translatable = ['name'];

    public static function getAll(){
        return self::select('id', 'name', 'sort')
            ->orderBY('sort', 'ASC')
            ->get();
    }

    public static function getAllByCategory($id)
    {
        return self::select('id', 'name', 'category_id', 'sort')
            ->where('category_id', $id)
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id', 'id')
            ->orderBy('sort', 'desc');
    }
}
