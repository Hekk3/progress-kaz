<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteLink extends Model
{
    //

    public function childs(){
        return $this->hasMany('App\Sitelink','parent_id','id');
    }
}
