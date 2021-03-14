@extends('layouts.app')
@section('content')
    <main class="main-content catalog-page search-page">
        <div class="container">
            <form method="get" action="{{ route('catalogsSearch') }}" class="search-input">
                <input type="text" name="keyword" value="{{$query or ''}}">
                <button type="submit">
                    <img src="../images/search.png" alt="">
                </button>
            </form>
            <div class="searcher">
                {{-- @php dd($projects, $catalogs) @endphp --}}
                @if($projects->count() == 0 && $questionnaires->count() == 0 && $subcategories->count() == 0 && $products->count() == 0 && $catalogs->count() == 0)
                    По запросу {{ "".$query."" }} ничего не найдено.
                @else
                    <h2>
                        Результаты по запросу: <br> <span style="color: #ff6400; font-size: 25px;">{{ "".$query."" }}</span>
                    </h2>
                   
                @endif
            </div>
            @if($projects->count() > 0)
           <div class="search-wrapper">
               {{-- <h2>Проекты</h2> --}}
               <h2>Проекты</h2>
               @endif
               <div class="project-wrapper">
                @foreach($projects as $v)
                
                <a href="#popup-modal{{ $v->id }}" class="project-image-arrows myButton" tabindex="0">{{ $v->name }}</a>
                        @php
                            $img=  json_decode($v->images);
                            foreach ($img as $keyxs=>$im){
                                $img[$keyxs]=   \App\Helpers\Cicada::imgSize('./storage/'.$im,200);
                            }
                            $imgDoble=$img[0];
                            if(isset($img[1])){
                                $imgDoble=$img[1];
                            }
                        @endphp
                        @endforeach

                        @foreach($projects as $v2)

                        <div id="popup-modal{{ $v2->id }}" class="white-popup mfp-hide">
                            <div class="modal-project">
                                <h1>{{ $v2->name }}</h1>
                                {!! $v2->full_description !!}
                                <div class="modal-slider">
                                    @if($v2->images != null)
                                        @foreach(json_decode($v2->images) as $image)
                                            @php
                                                $image=   \App\Helpers\Cicada::imgSize('./storage/'.$image,600);
                                            @endphp
                                            <div class="modal-img">
                                                <div class="modal-image-inform">
                                                    <div class="prop">
                                                        <div class="prop_img">
                                                            <div class="prop_img_src">
                                                                <img data-lazy="{{ Voyager::image($image) }}" alt=""
                                                                     style="width: 100% !important; height: 100% !important;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


                    @endforeach
                    <div class="search-wrapper">
                        <div class="catalog-wrapper">
                            <div class="catalog-inner">
                                <div class="catalog-inner-box">
                                    @foreach($subcategories as $subcategory)
                                    @php
                                    $products = $subcategory->products;
                                    if($query!=""){
                                     $products=  \App\Product::where("category_id",$subcategory->id)->where("name","like","%".$query."%")->orderBy('sort', 'ASC')->get();
                                    }
                                    App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                                @endphp
                                 @if($products->count() > 0)
                                 <div class="catalog-category catalog-inner-box_catalog"
                                      id="block_{{ $subcategory->id }}">
                                     <h2>{{ $subcategory->name }}</h2>
                                     <div class="catalog-links">
                                     {{-- @include('/partials/product', compact('products')) --}}
                                     @foreach ($products as $product)
                                     <a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                     @endforeach
                                    </div>
                                 </div>
                             @endif
                             @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($questionnaires->count() > 0)
                    <div class="search-wrapper">
                        <h2>Центр загрузки информации</h2>
                        @endif
                        <div class="download-wrapper">
                            @foreach ($catalogs as $catalog )
                            <a href="{{ Voyager::image(json_decode($catalog->file)[0]->download_link) }}">{{ $catalog->name }}</a>
                            @endforeach
                            @foreach($questionnaires as $questionnaire)
                                <div class="download-list-wrapper">
                                    <a href="{{ Voyager::image(json_decode($questionnaire->file)[0]->download_link) }}" target="_blank">{{ $questionnaire->name }}</a>
                                </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
            <style>
                .width1100 {
                    width: 100px;
                    height: 300px !important;
                }

                .prop {
                    width: 100%;
                }

                .prop_img {
                    width: 100%;
                    padding-top: 59%;
                }

                .prop_img_src {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    background-size: cover;
                    background-position: center center;
                }

                .prop_img_src img {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                }

                .modal-image-inform::before {
                    transition: 0.6s;
                }

                .mfp-arrow {
                    margin-top: 50px;
                }
            </style>
@endsection