<?php


namespace App\Http\Controllers;


use App\CoatingForFrame;
use App\FrameConnectionType;
use App\Helpers\TranslatesCollection;
use App\Production;
use App\ProductionPersonnel;
use App\ProductionPersonnelSlider;
use App\ProductionSlider;
use App\SummarySpecification;
use App\SummarySpecificationSlider;

class ProductionController extends Controller
{
    public function index(){

        $production = Production::getContent();
        $productionSliders = ProductionSlider::getAll();
        $personnel = ProductionPersonnel::getContent();
        $personnelSliders = ProductionPersonnelSlider::getAll();
        $frameConnectionType = FrameConnectionType::getContent();
        $coatingForFrame = CoatingForFrame::getContent();
        $summarySpecifications = SummarySpecification::getAll();
        $summarySpecificationSliders = SummarySpecificationSlider::getAll();

        TranslatesCollection::translate($production, app()->getLocale());
        TranslatesCollection::translate($productionSliders, app()->getLocale());
        TranslatesCollection::translate($personnel, app()->getLocale());
        TranslatesCollection::translate($personnelSliders, app()->getLocale());
        TranslatesCollection::translate($frameConnectionType, app()->getLocale());
        TranslatesCollection::translate($coatingForFrame, app()->getLocale());
        TranslatesCollection::translate($summarySpecifications, app()->getLocale());

        return view('productions.index', compact('production', 'productionSliders', 'personnel', 'personnelSliders',
            'frameConnectionType', 'coatingForFrame', 'summarySpecifications', 'summarySpecificationSliders'));
    }
}