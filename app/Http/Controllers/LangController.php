<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.02.2019
 * Time: 11:00
 */

namespace App\Http\Controllers;




use Illuminate\Support\Facades\Request;

class LangController extends Controller
{
    public function Index($locale){

        app()->setLocale($locale);
        session()->put('lang',$locale);
        return back();

    }
}
