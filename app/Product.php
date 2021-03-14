<?php

namespace App;

use App\Page\IPage;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Product extends Model implements IPage
{
    use Translatable;
    protected $translatable = ['name', 'description_content', 'specifications', 'meta_title',
        'meta_description','meta_keyword'];

//    public static function getAllByCategory($id){
//        return self::join('subcategories', 'subcategories.id', '=', 'products.category_id')
//            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
//            ->select('products.id', 'products.name', 'products.image', 'products.sort')
//            ->where('categories.id', $id)
//            ->orderBy('products.sort', 'ASC')
//            ->get();
//    }

    public static function getAllByManufacturerAndCategory($subcategory_id, $manufacturer_id){
        return self::select('products.id', 'products.name', 'products.image', 'products.sort', 'products.category_id')
            ->where('products.category_id', $subcategory_id)
            ->where('products.manufacturer_id', $manufacturer_id)
            ->orderBy('products.sort', 'ASC')
            ->get();
    }


    public static function getAllByIndustryAndCategory($subcategory_id, $industry_id){
        return self::join('industry_application_products', 'industry_application_products.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.image', 'products.sort', 'products.category_id')
            ->where('products.category_id', $subcategory_id)
            ->where('industry_application_products.industry_application_id', $industry_id)
            ->orderBy('products.sort', 'ASC')
            ->get();
    }


    public static function getAllByIndustryAndManufacturerAndCategory($subcategory_id, $industry_id, $manufacturer_id){
        return self::join('industry_application_products', 'industry_application_products.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.image', 'products.sort', 'products.category_id')
            ->where('products.category_id', $subcategory_id)
            ->where('products.manufacturer_id', $manufacturer_id)
            ->where('industry_application_products.industry_application_id', $industry_id)
            ->orderBy('products.sort', 'ASC')
            ->get();
    }


    public static function getAllByManufacturer($id){
        return self::select('id', 'name', 'image', 'sort', 'manufacturer_id')
            ->where('manufacturer_id', $id)
            ->orderBy('sort', 'ASC')
            ->get();
    }


    public static function search($keyword){

        if(app()->isLocale('ru')) {
            return self::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('description_content', 'LIKE', "%{$keyword}%")
                ->select('id', 'name', 'description_content', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }else {
            return self::whereTranslation('name', 'LIKE', "%{$keyword}%", [app()->getLocale()], false)
                ->select('id', 'name', 'description_content', 'sort')
                ->orderBy('sort', 'ASC')
                ->get();
        }
    }


    public static function getByID($id){
        return self::with('industry', 'related', 'subcategory')->find($id);
    }

    public function subcategory(){
        return $this->hasOne('App\Subcategory', 'id', 'category_id');
    }

    public function manufacturer(){
        return $this->hasOne('App\Manufacturer', 'id', 'manufacturer_id ');
    }

    public function industry(){
        return $this->hasMany('App\IndustryApplicationProduct', 'product_id', 'id');
    }

    public function related(){
        return $this->hasMany('App\ProductRelatedProduct', 'related_product_id', 'id');
    }


    public function manufacturerName(){
        return $this->manufacturer() ? $this->manufacturer->name : "";
    }
}
