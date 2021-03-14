<?php

namespace App;

use App\Page\IPage;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Vacancy extends Model implements IPage
{
    use Translatable;
    protected $translatable = ['name', 'city', 'short_description', 'salary', 'schedule', 'required_experience', 'responsibility',
        'condition', 'key_skills', 'requirements', 'meta_title', 'meta_description', 'meta_keyword'];

    public static function getAll(){
        return self::select('id', 'name', 'city', 'short_description', 'salary', 'schedule', 'sort')
            ->orderBy('sort', 'ASC')
            ->get();
    }

    public static function getByID($id){
        return self::select('id', 'name', 'city', 'salary', 'required_experience', 'responsibility',
        'condition', 'key_skills', 'requirements')
            ->find($id);
    }

    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('short_description', 'LIKE', "%{$keyword}%")
                ->select('id', 'name', 'city', 'short_description', 'salary', 'schedule', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('short_description', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name', 'city', 'short_description', 'salary', 'schedule', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }


}
