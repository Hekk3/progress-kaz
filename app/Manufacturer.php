<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Manufacturer extends Model
{
    const isActive = 1;
    const isNotActive = 0;

    use Translatable;
    protected $translatable = ['name', 'meta_title','meta_description','meta_keyword'];

    public static function getAll(){
        return self::select('id', 'name', 'image', 'status', 'sort')
            ->where('status', self::isActive)
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->select('id', 'name', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('name', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }

    public static function getAllByCategory($id)
    {
        return self::select('id', 'name', 'category_id', 'sort', 'status')
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