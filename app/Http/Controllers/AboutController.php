<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27.05.2020
 * Time: 17:30
 */

namespace App\Http\Controllers;


use App\CooperationReason;
use App\EquipmentArea;
use App\Helpers\TranslatesCollection;

class AboutController extends Controller
{
    public function reasonsToWorkWithUs(){

        $model = CooperationReason::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('about.reasons-to-work-with-us', compact('model'));
    }

    public function areasOfUse(){

        $model = EquipmentArea::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('about.areas-of-use');
    }


}
