<?php

namespace App\Helpers;
use Illuminate\Support\Collection;


class TranslatesCollection {

    public static function translate(&$collection, $locale) {
        if($collection instanceof Collection){
            foreach($collection as $key => $item) {
                $collection[$key] = $item->translate($locale);
            }
        }else{
            $collection = $collection->translate($locale);
        }
    }



}

