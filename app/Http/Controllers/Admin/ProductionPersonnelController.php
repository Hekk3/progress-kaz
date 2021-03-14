<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.03.2020
 * Time: 16:46
 */

namespace App\Http\Controllers\Admin;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;

class ProductionPersonnelController extends VoyagerBaseController
{
    public function index(Request $request){
        return parent::show($request, 1);
    }

}
