
@foreach($subcategories as $subcategory)

    @if($manufacturer_id == 'null' && $industry_id == 'null')
        @php $products = $subcategory->products @endphp
    @elseif($manufacturer_id != 'null' && $industry_id == 'null')
        @php $products = \App\Product::getAllByManufacturerAndCategory($subcategory->id, $manufacturer_id) @endphp
    @elseif($manufacturer_id == 'null' && $industry_id != 'null')
        @php $products = \App\Product::getAllByIndustryAndCategory($subcategory->id, $industry_id) @endphp
    @else
        @php $products = \App\Product::getAllByIndustryAndManufacturerAndCategory($subcategory->id, $industry_id, $manufacturer_id) @endphp
    @endif

    @php
        if($query!=""){
           $products=  \App\Product::wherein("id",array_keys($products->groupby("id")->toarray()))->where("name","like","%".$query."%")->orderBy('sort', 'desc')->get();
        }
    @endphp

    @if($products->count() > 0 && $products->count() != 2 && $products->count() != 1)
        @php App\Helpers\TranslatesCollection::translate($products, app()->getLocale()) @endphp
        <div class="catalog-category catalog-inner-box_catalog">
            <h2>{{ $subcategory->name }}</h2>
            @include('/partials/product', compact('products'))
        </div>
        @elseif($products->count() == 2 )
        <div class="catalog-category catalog-inner-box_catalog catalog-33" id="block_{{ $subcategory->id }}">
            <h2>{{ $subcategory->name }}</h2>
            @include('/partials/product', compact('products'))
        </div>
    @elseif($products->count() == 1 )
        <div class="catalog-category catalog-inner-box_catalog catalog-50" id="block_{{ $subcategory->id }}">
            <h2>{{ $subcategory->name }}</h2>
            @include('/partials/product', compact('products'))
        </div>
    @endif

@endforeach
