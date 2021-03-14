<?php


namespace App\Http\Controllers;


use App\Helpers\TranslatesCollection;
use App\Partner;

class PartnerController extends Controller
{
    public function index(){

        $model = Partner::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('partners.index', compact('model'));
    }
}