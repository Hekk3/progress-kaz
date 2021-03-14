<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Subcategory extends Model
{
    const isActive = 1;
    const isNotActive = 0;

    use Translatable;
    protected $translatable = ['name'];

    public static function getAllByCategory($id)
    {
        return self::select('id', 'name', 'status', 'category_id', 'sort')
            ->where('category_id', $id)
            ->where('status', self::isActive)
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function subFind($id)
    {
        return self::select('id', 'name', 'status', 'category_id', 'sort')
            ->where('id', $id)
            ->where('status', self::isActive)
            ->orderBy('sort', 'ASC')
            ->get();
    }



    public static function getAll()
    {
        return self::select('id', 'name', 'status', 'category_id', 'sort')
            ->where('status', self::isActive)
            ->orderBy('sort', 'ASC')
            ->get();
    }


    public function products()
    {
        return $this->hasMany('App\Product', 'category_id', 'id')
            ->orderBy('sort', 'desc');
    }



    public static function pSearch($like)
    {
        return self::hasMany('App\Product', 'category_id', 'id')->like("%" . $like . "%")
            ->orderBy('sort', 'desc');
    }


    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

}
