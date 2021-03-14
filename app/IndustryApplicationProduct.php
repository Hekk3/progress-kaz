<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IndustryApplicationProduct extends Model
{
    public function application(){
        return $this->hasOne('App\IndustryApplication', 'id', 'industry_application_id');
    }

    public function applicationName(){
        return $this->application() ? $this->application->name : "";
    }
}
