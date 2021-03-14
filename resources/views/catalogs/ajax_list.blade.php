<div class="catalog-category catalog-inner-box_catalog" id="block_{{ $subcategory->id }}">
    <h2>{{ $subcategory->name }}</h2>
    @include('/partials/product', compact('products'))
</div>