@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page project-page licencies-page">
        <div class="container">
            <div class="main-title">
                <h1>{{ $page->getPage()->title }}</h1>
            </div>
            <div class="certificates-slider">
                @foreach($model as $kexs=>$v)
                    @php
                        $imgSlide=json_decode($v->imageDop,true);
                    @endphp
                    <div class="certificate-slide">
                        <div class="certificate-image">
                            <a href="{{ Voyager::image($v->image) }}" data-fancybox="group{{$kexs}}"
                               class="certificate-zoom">
                                <img src="{{ Voyager::image($v->image) }}" alt="{{ $v->description }}">
                                <p class="about-certificate"></p>
                            </a>
                            @if(!is_null($imgSlide))
                                @foreach($imgSlide as $dopimg)
                                    @if($dopimg!="")
                                        <a href="{{ Voyager::image($dopimg) }}" data-fancybox="group{{$kexs}}"
                                           style="display: none;"></a>
                                    @endif
                                @endforeach
                            @endif
                            <p class='about-certificate'
                               style=" opacity: 1; text-align: center; padding: 3px; ">{{$v->description}}</p>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </main>

    <style>
        .certificates-slider .certificate-slide .certificate-zoom::before {
            display: none;
        }
    </style>
@endsection
