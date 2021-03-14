<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30.01.2020
 * Time: 15:29
 */

namespace App\Http\Controllers\Admin;


use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;

class NewsListController extends VoyagerBaseController
{
    public function index(Request $request){
        return parent::show($request, 1);
    }
}
