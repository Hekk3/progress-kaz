<?php


namespace App\Http\Controllers;


use App\Helpers\TranslatesCollection;
use App\Vacancy;

class VacancyController extends Controller
{
    public function index($id){

        $model = Vacancy::getByID($id);
        if($model){
            TranslatesCollection::translate($model, app()->getLocale());
            return view('vacancies.index', compact('model'));
        }else{
            abort(404);
        }
    }


    public function all(){

        $model = Vacancy::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('vacancies.all', compact('model'));
    }
}