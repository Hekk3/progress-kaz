<?php


namespace App\Http\Controllers;


use App\Catalog;
use App\Category;
use App\Certification;
use App\CoatingForFrame;
use App\CooperationReason;
use App\EquipmentArea;
use App\FrameConnectionType;
use App\Helpers\TranslatesCollection;
use App\Manager;
use App\Manufacturer;
use App\News;
use App\Partner;
use App\Presentation;
use App\Product;
use App\Production;
use App\ProductionPersonnel;
use App\Project;
use App\Questionnaire;
use App\Requisite;
use App\Service;
use App\SummarySpecification;
use App\Vacancy;
use App\Subcategory;

class SearchController extends Controller
{
    public function index()
    {

        $keyword = $_REQUEST["keyword"];
        $cooperation_reasons = CooperationReason::search($keyword);
        $equipment_areas = EquipmentArea::search($keyword);
        $vacancies = Vacancy::search($keyword);

        $production = Production::search($keyword);
        $personnel = ProductionPersonnel::search($keyword);
        $frame_connection_type = FrameConnectionType::search($keyword);
        $coating_for_frame = CoatingForFrame::search($keyword);
        $summary_specifications = SummarySpecification::search($keyword);

        $news = News::search($keyword);
        $categories = Category::search($keyword);
        $manufacturers = Manufacturer::search($keyword);
        $products = Product::search($keyword);
        $services = Service::search($keyword);

        $catalogs = Catalog::search($keyword);
        $presentations = Presentation::search($keyword);
        $questionnaires = Questionnaire::search($keyword);

        $requisite = Requisite::search($keyword);
        $managers = Manager::search($keyword);
        $partners = Partner::search($keyword);
        $projects = Project::search($keyword);

        $subcategories = Subcategory::where('name', 'like', '%' . $keyword .'%')->get();

        if ($cooperation_reasons->count() > 0 || $equipment_areas->count() > 0 || $vacancies->count() > 0
            || $production != null || $personnel != null || $frame_connection_type != null
            || $coating_for_frame != null || $summary_specifications->count() > 0 || $news->count() > 0
            || $categories->count() > 0 || $manufacturers->count() > 0 || $products->count() > 0
            || $services->count() > 0 || $catalogs->count() > 0 || $presentations->count() > 0
            || $questionnaires->count() > 0 || $requisite != null || $managers->count() > 0
            || $partners->count() > 0 || $projects->count() > 0) {
            $status = true;
        } else {
            $status = false;
        }

        $query = $keyword;

        return view('search.index', compact('status', 'query', 'subcategories', 'cooperation_reasons', 'equipment_areas', 'vacancies',
            'production', 'personnel', 'frame_connection_type', 'coating_for_frame', 'summary_specifications', 'news',
            'categories', 'manufacturers', 'products', 'services', 'catalogs', 'presentations', 'questionnaires', 'requisite',
            'managers', 'partners', 'projects'));

        //  return view('search.index');
    }
}