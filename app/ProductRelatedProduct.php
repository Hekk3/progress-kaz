<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductRelatedProduct extends Model
{

    public static function getAllByProduct($id){
        return self::join('related_products', 'related_products.id', '=', 'product_related_products.related_product_id')
            ->select('product_related_products.id', 'product_related_products.product_id')
            ->where('related_products.product_id', $id)
            ->get();
    }

    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

}
