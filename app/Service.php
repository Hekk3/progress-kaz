<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Service extends Model
{
    use Translatable;
    protected $translatable = ['name','description'];

    public static function getAll(){
        return self::select('id', 'name','description', 'icon', 'image', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public function types(){
        return $this->hasMany('App\ServiceImage', 'service_id', 'id')
            ->select('id', 'image', 'text', 'sort')
            ->orderBy('sort', 'ASC');
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->select('id', 'name', 'description', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('description', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name', 'description', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }
}
