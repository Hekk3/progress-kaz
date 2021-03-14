<?php


namespace App\Http\Controllers;


use App\Documentation;
use App\Helpers\TranslatesCollection;
use App\Product;
use App\ProductRelatedProduct;
use App\RelatedProduct;

class ProductController extends Controller
{
    public function index($id){
        $model = Product::getByID($id);
        if($model){

            $documentation = Documentation::getAllByProduct($id);
            $related_products = RelatedProduct::join('products','products.id','=','related_products.related_product_id')
                ->where('related_products.product_id', $id)
                ->select('products.*')
                ->pluck('id');
            $related_products = Product::findMany($related_products);
            

            TranslatesCollection::translate($model, app()->getLocale());
            TranslatesCollection::translate($documentation, app()->getLocale());

            return view('products.index', compact('model', 'documentation', 'related_products'));
        }else{
            abort(404);
        }
    }
}