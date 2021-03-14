@php $m = 0 @endphp
@foreach($products as $product)
    @php $m++ @endphp
    @if($m % 4 == 1)
        <div class="catalog-category-list">
    @endif
        <a href="{{ route('product', ['id' => $product->id]) }}">
            <div class="catalog-info catalog-inner-info">
                <div class="catalog-image catalog-inner-image">
                    @php
                        $image_size=   'storage/'.$product->image;
                    @endphp
                    <img src="{{ asset('storage/'.$product->image) }}" alt="">
                </div>
                <div class="catalog-content catalog-inner-content">
                    <h1>{{ $product->name }}</h1>
                </div>
            </div>
        </a>
    @if($m % 4 == 0)
        </div>
    @endif
@endforeach

@if($m % 4 != 0)
    </div>
@endif