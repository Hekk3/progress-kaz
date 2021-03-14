<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 31.01.2020
 * Time: 14:46
 */

namespace App\Http\Controllers\Admin;


use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;

class CopyrightController extends VoyagerBaseController
{
    public function index(Request $request){
        return parent::show($request, 1);
    }

}
