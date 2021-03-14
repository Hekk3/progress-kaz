<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10.03.2020
 * Time: 11:54
 */

namespace App\Http\Controllers\Admin;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;

class AddressController extends VoyagerBaseController
{
    public function index(Request $request){
        return parent::show($request, 1);
    }

}
