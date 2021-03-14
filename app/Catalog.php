<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Catalog extends Model
{
    use Translatable;
    protected $translatable = ['name'];

    public static function getAll(){
        return self::select('id', 'name', 'file', 'file_type', 'icon_id', 'sort')
            ->with('icon')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public function icon(){
        return $this->hasOne('App\Icon', 'id', 'icon_id')->select('id', 'image');
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->select('id', 'name','file', 'file_type', 'icon_id', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('name', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name','file', 'file_type', 'icon_id', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }
}
