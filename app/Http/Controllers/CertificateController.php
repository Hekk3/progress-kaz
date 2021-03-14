<?php


namespace App\Http\Controllers;


use App\Certification;
use App\Helpers\TranslatesCollection;

class CertificateController extends Controller
{
    public function index(){

        $model = Certification::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('certificates.index', compact('model'));
    }
}