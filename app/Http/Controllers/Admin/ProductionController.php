<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.03.2020
 * Time: 10:00
 */

namespace App\Http\Controllers\Admin;


use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;

class ProductionController extends VoyagerBaseController
{
    public function index(Request $request){
        return parent::show($request, 1);
    }

}
