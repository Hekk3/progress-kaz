<?php

namespace App;

use App\Page\IPage;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Category extends Model implements IPage
{
    const isCategory = 1;
    const isSecondaryCategory = 2;
    const isActive = 1;
    const isNotActive = 0;

    use Translatable;
    protected $translatable = ['name', 'meta_title','meta_description','meta_keyword'];

    public static function getCategories(){
        return self::select('id', 'name', 'image', 'icon', 'sort', 'type', 'status')
            ->where('type', self::isCategory)
            ->where('status', self::isActive)
            ->with('subcategories')
            ->orderBy('sort', 'ASC')
            ->get();
    }


    public static function getSubCategories(){
        return self::select('id', 'name', 'image', 'icon', 'sort', 'type', 'status')
            ->where('type', self::isSecondaryCategory)
            ->where('status', self::isActive)
            ->orderBy('sort', 'ASC')
            ->get();
    }


    public static function getAll(){
        return self::select('id', 'name', 'image', 'icon', 'sort', 'type')
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

    public function subcategories(){
        return $this->hasMany('App\Subcategory', 'category_id', 'id')
            ->where('status', self::isActive)
            ->orderBy('sort', 'ASC');
    }
}
