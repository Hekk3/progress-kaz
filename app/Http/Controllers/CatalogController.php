<?php


namespace App\Http\Controllers;

use App\Category;
use App\Helpers\TranslatesCollection;
use App\IndustryApplication;
use App\Manufacturer;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function all()
    {

        $subCategories = Category::getSubCategories();
        $manufacturers = Manufacturer::getAll();

        TranslatesCollection::translate($subCategories, app()->getLocale());
        TranslatesCollection::translate($manufacturers, app()->getLocale());

        return view('catalogs.all', compact('subCategories', 'manufacturers'));
    }


    public function catalog($id, $sub_id = null)
    {

        $model = Category::find($id);
        if ($model) {
            
            $categories = Category::getAll();
            if (!$sub_id) {
                
            }else{
                $sub = Subcategory::find($sub_id);
                TranslatesCollection::translate($sub, app()->getLocale());
            }
            
            $subcategories = Subcategory::getAllByCategory($id);

            $industry_applications = IndustryApplication::getAll();
            $manufacturers = Manufacturer::getAll();

            TranslatesCollection::translate($categories, app()->getLocale());
            TranslatesCollection::translate($subcategories, app()->getLocale());
            if ($sub_id) {
                $subcats = [];
                $subcats[] = $sub;
            }else{
                $subcats = $subcategories;
            }
            TranslatesCollection::translate($industry_applications, app()->getLocale());
            TranslatesCollection::translate($manufacturers, app()->getLocale());

            return view('catalogs.catalog', compact('model', 'categories', 'subcategories',
                'industry_applications', 'manufacturers','subcats'));
        } else {
            abort(404);
        }
    }

    public function getSubcatalog(Request $request)
    {
        $request = $request->all();

        $subcategories = [];
        if ($request["category_id"] == "null") {
            $subcategories = Subcategory::getAll();
        } else {
            $subcategories = Subcategory::getAllByCategory($request["category_id"]);
        }


        TranslatesCollection::translate($subcategories, app()->getLocale());
        $subcategory_option = '<option value="null" >Все</option>';
        foreach ($subcategories as $subcategory) {
            if ($subcategory->products->count() > 0) {
                $subcategory_option .= '<option value="' . $subcategory->id . '" >' . $subcategory->name . '</option>';
            }
        }
              
        return [$subcategory_option, $this->getIndustry($request["category_id"]), $this->getManufacturer($request["category_id"])];
    }

    public function getIndustry($id)
    {
        $industry_applications = [];
        if ($id == "null") {
            $industry_applications = IndustryApplication::getAll();
        } else {
            $industry_applications = IndustryApplication::getAllByCategory($id);
        }

        TranslatesCollection::translate($industry_applications, app()->getLocale());
        $application_option = '<option value="null" >Все</option>';
        foreach ($industry_applications as $application) {
            if ($application->products->count() > 0) {
                $application_option .= '<option value="' . $application->id . '" >' . $application->name . '</option>';
            }
        }

        return $application_option;
    }

    public function getManufacturer($id)
    {
        $manufactures = [];
        if ($id == "null") {
            $manufactures = Manufacturer::getAll();
        } else {
            $manufactures = Manufacturer::getAllByCategory($id);
        }
        
        TranslatesCollection::translate($manufactures, app()->getLocale());
        $manufacturer_option = '<option value="null" >Все</option>';
        foreach ($manufactures as $manufacturer) {
            if ($manufacturer->products->count() > 0) {
                $manufacturer_option .= '<option value="' . $manufacturer->id . '" >' . $manufacturer->name . '</option>';
            }
        }
        return $manufacturer_option;
    }
        

//    public function catalogsSearch(Request $request)
//    {
//        $request = $request->all();
//
//        $query = "";
//        if (isset($request["keyword"])) {
//            $query = $request["keyword"];
//        }
//
//
////        $catalogs = Catalog::getAll();
////        $presentations = Presentation::getAll();
////        $questionnaires = Questionnaire::getAll();
////        TranslatesCollection::translate($catalogs, app()->getLocale());
////        TranslatesCollection::translate($presentations, app()->getLocale());
////        TranslatesCollection::translate($questionnaires, app()->getLocale());
//
//
//
//        $project = \App\Project::search($query);
//        TranslatesCollection::translate($project, app()->getLocale());
//
    //    $industry_id = "";
    //    if (isset($request["industry_id"])) {
    //        $industry_id = $request["industry_id"];
    //    }
//        $model = Category::get();
//        if ($model) {
//            $categories = Category::getAll();
//            $subcategories = Subcategory::getAll();
//            $industry_applications = IndustryApplication::getAll();
//            $manufacturers = Manufacturer::getAll();
//
//
//            TranslatesCollection::translate($categories, app()->getLocale());
//            TranslatesCollection::translate($subcategories, app()->getLocale());
//            TranslatesCollection::translate($industry_applications, app()->getLocale());
//            TranslatesCollection::translate($manufacturers, app()->getLocale());
//            return view('catalogs.search', compact('model', 'query', 'project', 'categories', 'industry_id', 'subcategories', 'industry_applications', 'manufacturers'));
//        } else {
//            abort(404);
//        }
//
//    }

    public function manufacturer($id)
    {

        $model = Manufacturer::find($id);
        if ($model) {

            $categories = Category::getAll();
            $products = Product::getAllByManufacturer($id);
            $industry_applications = IndustryApplication::getAll();
            $manufacturers = Manufacturer::getAll();

            TranslatesCollection::translate($categories, app()->getLocale());
            TranslatesCollection::translate($products, app()->getLocale());
            TranslatesCollection::translate($industry_applications, app()->getLocale());
            TranslatesCollection::translate($manufacturers, app()->getLocale());

            return view('catalogs.manufacturer', compact('model', 'categories', 'products',
                'industry_applications', 'manufacturers'));
        } else {
            abort(404);
        }
    }


    public function filter(Request $request)
    {

        $industry_id = $request->get('industry_id');
        $manufacturer_id = $request->get('manufacturer_id');
        $subsubcategories = null;
        $query = "";
        $req = $request->all();
        if (isset($req["query"])) {
            $query = $req["query"];
        }

        if ($request->has('category_id') && $request->get('category_id') != 'null') {

            $category = Category::find($request->get('category_id'));
            $title = $category ? $category->name : '';
            $subcategories = Subcategory::getAllByCategory($request->get('category_id'));
            $industry = IndustryApplication::getAllByCategory($request->get('category_id'));
            $manufacturer = Manufacturer::getAllByCategory($request->get('category_id'));
            if ($request->has('subcategory_id')) {
                if ($request->get('subcategory_id') != 'null') {
                    $subcategories = Subcategory::subFind($request->get('subcategory_id')); //отвечает за отрисовку контента
                    // $subcategories = Subcategory::subFind($request->get('subcategory_id'));
                    // $subsubcategories = 
                }
            }
            $third = IndustryApplication::where('category_id', $request->get('category_id'))->get();
            $forth = Manufacturer::where('category_id', $request->get('category_id'))->get();
            $html = view('catalogs.ajax_catalog', compact('subcategories', 'industry_id', 'query', 'manufacturer_id'))->render();
            return response()->json(['html' => $html, 'title' => $title, 'third' =>  $third, 'forth' => $forth]);

        } else {
            $manufacturer = Manufacturer::find($manufacturer_id);
            $title = $manufacturer ? $manufacturer->name : '';
            $products = Product::select('products.id', 'products.name', 'products.image', 'products.sort', 'products.manufacturer_id');


            $html = "";
            $subcategories = Subcategory::getAll();
            if ($request->has('subcategory_id')) {
                if ($request->get('subcategory_id') != 'null') {
                    $subcategories = Subcategory::subFind($request->get('subcategory_id'));
                }
            }
            TranslatesCollection::translate($subcategories, app()->getLocale());
            foreach ($subcategories as $subcategory) {
                $products = \App\Product::where("category_id", $subcategory->id);
                if ($query != "") {
                    $products = $products->where("name", "like", "%" . $query . "%");
                }

                if ($industry_id != 'null') {
                    $products = $products
                        ->join('industry_application_products', 'industry_application_products.product_id',
                        '=', 'products.id')
                        ->where('industry_application_products.industry_application_id', $industry_id);
                }
                if ($manufacturer_id != 'null') {
                    $products = $products->where('products.manufacturer_id', $manufacturer_id);
                }

                $products = $products->orderBy('products.sort', 'desc')->get();


                \App\Helpers\TranslatesCollection::translate($products, app()->getLocale());

                if (count($products) > 0) {
                    $html .= view('catalogs.ajax_list', compact('products', 'subcategory', 'query'))->render();
                }
            }

            return response()->json(['html' => $html, 'title' => $title]);
        }

    }


}