<?php


namespace App\Http\Controllers;


use App\Catalog;
use App\Helpers\TranslatesCollection;
use App\Presentation;
use App\Questionnaire;

class DownloadCenterController extends Controller
{
    public function index(){

        $catalogs = Catalog::getAll();
        $presentations = Presentation::getAll();
        $questionnaires = Questionnaire::getAll();

        TranslatesCollection::translate($catalogs, app()->getLocale());
        TranslatesCollection::translate($presentations, app()->getLocale());
        TranslatesCollection::translate($questionnaires, app()->getLocale());

        return view('download-center.index', compact('catalogs', 'presentations', 'questionnaires'));
    }
}