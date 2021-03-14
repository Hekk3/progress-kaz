<?php


namespace App\Http\Controllers;

use App\Helpers\TranslatesCollection;
use App\Service;

class ServiceController extends Controller
{
    public function index(){

        $model = Service::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('services.index', compact('model'));
    }
}