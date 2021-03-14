@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page project-page">
        <div class="container">
                <h1>{{ $page->getPage()->title }}</h1>
            <div class="project-slider">
                @php $m=0 @endphp


                @foreach($model as $v)
                    @php $m++ @endphp
                    @if($m % 6 == 1)
                            @endif
                            <a href="#popup-modal{{ $v->id }}" class="project-slide project-image-arrows myButton">
                                    <div class="project-image">
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

                                        <div class="project-image-1">
                                            @if($v->images != null)
                                                <img src="{{ Voyager::image($img[0]) }}" data-lazy="{{ Voyager::image($img[0]) }}"
                                                     alt="{{ $v->name }}">
                                            @endif
                                        </div>

                                        <div class="project-image-2">
                                            <div class="project-image-inform">
                                                <img src="{{ Voyager::image($imgDoble) }}" data-lazy="{{ Voyager::image($imgDoble) }}"
                                                     alt="{{ $v->name }}">
                                            </div>
                                            <div class="popup-gallery">
                                                <img data-lazy="{{ asset('images/arrow.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-text">
                                        <h1>{{ $v->name }}</h1>
                                        {!! $v->short_description !!}
                                    </div>
                            </a>


                            @if($m % 6 == 0)
                    @endif
                @endforeach
            </div>
        </div>
    </main>
    @foreach($model as $v2)

        <div id="popup-modal{{ $v2->id }}" class="white-popup mfp-hide">
            <div class="modal-project">
                <h1>{{ $v2->name }}</h1>
                {!! $v2->full_description !!}
                <div class="modal-slider">
                    @if($v2->images != null)
                        @foreach(json_decode($v2->images) as $image)
                            @php
                                $image_resize=   \App\Helpers\Cicada::imgSize('./storage/'.$image,600);
                            @endphp
                            <div class="modal-img">
                                <div class="modal-image-inform">
                                    <div class="prop">
                                        <div class="prop_img">
                                            <div class="prop_img_src">
                                <a href="{{ Voyager::image($image_resize) }}" data-fancybox='modal_img_{{ $v2->id }}'>
                                    <img data-lazy='{{ Voyager::image($image_resize) }}'
                                    style=""
                                     src="{{ Voyager::image($image_resize) }}" alt="">
                                </a>
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
            /* padding-top: 59%; */
        }

        </style>

@endsection

