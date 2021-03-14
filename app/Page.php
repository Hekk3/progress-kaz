<?php

namespace App;

use App\Page\IPage;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Page extends Model implements IPage
{
    use Translatable;
    protected $translatable = ['title','meta_title','meta_description','meta_keyword'];

    public static function getByUrl($url){
        return self::select('url', 'title', 'meta_title', 'meta_description', 'meta_keyword')
            ->where('url', $url)
            ->first();
    }
}
