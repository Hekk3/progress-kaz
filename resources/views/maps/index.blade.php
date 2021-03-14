@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page">
        <div class="container">
            <div class="main-title">
                <h3>{{ $page->getPage()->title }}</h3>
            </div>
            <div class="map-inner">
                <div class="map-left map-list">

                    @foreach (menu('map_left', '_json') as $menuItem)
                        @php $menuItem = $menuItem->translate(app()->getLocale()) @endphp

                        <a href="{{ $menuItem->url }}" class="title-map">{{ $menuItem->title }}</a>
                        @if(count($menuItem->children) > 0)
                            <ul class=sub-map>
                                @foreach($menuItem->children as $menuSubItem)
                                    @php $menuSubItem = $menuSubItem->translate(app()->getLocale()) @endphp
                                    <li>
                                        <a href="{{ $menuSubItem->url }}">{{ $menuSubItem->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @elseif($menuItem->url == '/catalogs')
                            @foreach($g_categories as $category)
                                @php
                                    $subcategories = $category->subcategories;
                                    App\Helpers\TranslatesCollection::translate($subcategories, app()->getLocale())
                                @endphp
                                <ul class="sub-map">
                                    <li>
                                        <a href="{{ route('catalog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                    @if($subcategories != null)
                                        <ul class="subtitles">
                                            @foreach($subcategories as $subcategory)
                                                @php
                                                    $products = $subcategory->products;
                                                    App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                                                @endphp
                                                <li>
                                                    <a href="{{ route('catalog', ['id' => $category->id]) }}#block_{{ $subcategory->id }}">
                                                        {{ $subcategory->name }}</a>
                                                </li>
                                                @if($products != null)
                                                    <ul class="subtitles subtitles-inner">
                                                        @foreach($products as $product)
                                                            <li>
                                                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                                                    {{ $product->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            @endforeach
                                        </ul>
                                    @endif
                                </ul>
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <div class="map-right map-list">

                    @foreach (menu('map_right', '_json') as $menuItem)
                        @php $menuItem = $menuItem->translate(app()->getLocale()) @endphp

                        <a href="{{ $menuItem->url }}" class="title-map">{{ $menuItem->title }}</a>
                        @if(count($menuItem->children) > 0)
                            <ul class=sub-map>
                                @foreach($menuItem->children as $menuSubItem)
                                    @php $menuSubItem = $menuSubItem->translate(app()->getLocale()) @endphp
                                    <li>
                                        <a href="{{ $menuSubItem->url }}">{{ $menuSubItem->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @elseif($menuItem->url == '/catalogs')
                            @foreach($g_categories as $category)
                                @php
                                    $subcategories = $category->subcategories;
                                    App\Helpers\TranslatesCollection::translate($subcategories, app()->getLocale())
                                @endphp
                                <ul class="sub-map">
                                    <li>
                                        <a href="{{ route('catalog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                    @if($subcategories != null)
                                        <ul class="subtitles">
                                            @foreach($subcategories as $subcategory)
                                                @php
                                                    $products = $subcategory->products;
                                                    App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                                                @endphp
                                                <li>
                                                    <a href="{{ route('catalog', ['id' => $category->id]) }}#block_{{ $subcategory->id }}">
                                                        {{ $subcategory->name }}</a>
                                                </li>
                                                @if($products != null)
                                                    <ul class="subtitles subtitles-inner">
                                                        @foreach($products as $product)
                                                            <li>
                                                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                                                    {{ $product->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            @endforeach
                                        </ul>
                                    @endif
                                </ul>
                            @endforeach
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </main>

@endsection

