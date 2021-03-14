<?php


namespace App\Http\Controllers;

use App\Helpers\TranslatesCollection;
use App\Project;

class ProjectController extends Controller
{
    public function index(){

        $model = Project::getAll();
        TranslatesCollection::translate($model, app()->getLocale());

        return view('projects.index', compact('model'));
    }
}