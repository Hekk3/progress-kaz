<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class ServiceImage extends Model
{
    use Translatable;
    protected $translatable = ['text'];
    
}
