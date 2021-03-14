@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page catalog-list">
        <div class="container">

            <div class="main-title">
                <h1>{{ $model->name }}</h1>
            </div>

            <div class="catalog-breadcrumbs">
                <div class="catalog-page-breadcrumbs">
                    <div class="breadcrumb">
                        <a href="{{ route('catalogs') }}">@lang('texts.Каталог')</a>
                    </div>
                    <div class="breadcrumb-active">
                        <a>{{ $model->name }}</a>
                    </div>
                </div>
                <div class="catalog-filter">
                    <div class="catalog-select">
                        <select name="category_id" class='category-select' id="industry-1">
                            <option value="null">Все</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"  data-limit='37' class='short-option' {{ $model->id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="catalog-select">
                        @php
                            $subcategory_id=isset($_REQUEST["subcategory_id"])?$_REQUEST["subcategory_id"]:'';
                        @endphp
                        @if($subcategory_id!="")
                            <div class="onajax"></div>
                        @endif
                        <select name="subcategory_id" class='category-select' id="subcategory_id">
                            <option value="null">ТИП</option>
                            <option value="null">Все</option>
                            @foreach($subcategories as $subcategory)
                                @if($subcategory->products->count() > 0)
                                    <option value="{{ $subcategory->id }}"
                                            @if($subcategory_id==$subcategory->id)selected @endif>{{ $subcategory->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="catalog-select">
                        @php
                            $industry_id = isset($_REQUEST["industry_id"]) ? $_REQUEST["industry_id"] : '';
                        @endphp
                        @if($industry_id != "")
                            <div class="onajax"></div>
                        @endif
                        <select name="industry_id" class='category-select' id="industry_id">
                            <option value="null">ОТРАСЛЬ</option>
                            <option value="null">Все</option>
                            @foreach($industry_applications as $application)
                                <option value="{{ $application->id }}"
                                    @if($industry_id==$application->id)selected @endif>{{ $application->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="catalog-select">
                        @php
                            $manufacturer_id = isset($_REQUEST["manufacturer_id"]) ? $_REQUEST["manufacturer_id"] : '';
                        @endphp
                         @if($manufacturer_id != "")
                         <div class="onajax"></div>
                     @endif
                        <select name="manufacturer_id" class='category-select' id="manufacturer_id">
                            <option value="null">ПРОИЗВОДИТЕЛЬ</option>
                            <option value="null">Все</option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}"
                                    @if($manufacturer_id==$manufacturer->id)selected @endif>{{ $manufacturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="search_dd" value="{{$query or ''}}">
                </div>
            </div>


            <div class="catalog-inner">
                <div class="catalog-inner-box">
                    @foreach($subcats as $subcategory)
                        @php
                            $products = $subcategory->products;
                            App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                        @endphp

                        @if($products->count() > 0 && $products->count() != 2 && $products->count() != 1)
                            <div class="catalog-category catalog-inner-box_catalog" id="block_{{ $subcategory->id }}">
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
                            {{-- @elseif($products->count() == 1 )
                            <div class="catalog-category catalog-inner-box_catalog" id="block_{{ $subcategory->id }}">
                                <h2>{{ $subcategory->name }}</h2>
                                @include('/partials/product', compact('products'))
                            </div> --}}
                        @endif
                        
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <style>
        .catalog-inner-box {
            display: flex !important;
            flex-wrap: wrap;
        }


        /* .catalog-inner-box_catalog.catalog-33 {
            max-width:33%;
        } */
    </style>
    {{-- <script>
        let selecter = document.getElementById('subcategory_id')
        
        selecter.addEventListener('change',function(){
            let array = window.location.href.split('/')
            console.log(array);
            if (!array[5]) {
                window.location.replace(`${window.location.href}/${this.value}?c`)    
            }else{
                array[5] = this.value
                let url = array.join('/')
                window.location.replace(`${url}`)
            }
            
        })
    </script> --}}


@endsection
