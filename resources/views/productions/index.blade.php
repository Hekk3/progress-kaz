@extends('layouts.app')
@section('content')

    <main id="manufacture-page">
        <div class="container">
            <section id="intro">
                <h1 class="page-title">{{ $page->getPage()->title }}</h1>
                <div class="intro-group">
                    <p class="page-subtitle">
                       {{ $production->first_content }}
                    </p>
                    <div class="intro-certificate certificate">
                        <p class="certificate-text">
                            Сертификат на серийное<br> производство каркасов<br> рукавного фильтра
                        </p>
                        <div class="slider certificate-slider">
                            <button class="previous slider-btn"></button>
                            <button class="next slider-btn"></button>
                            <ul class="siemas">
                                @foreach($productionSliders as $slider)
                                    <div class="box">
                                        <a data-fancybox href="{{ Voyager::image($slider->image) }}"><img src="{{ Voyager::image($slider->image) }}"
                                        class="certificate-image"></a>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section id="welding">
                <div class="box">
                    <a data-fancybox="welding-gallery" href="{{ Voyager::image($production->second_image) }}"><img class="welding-image" src="{{ Voyager::image($production->second_image) }}"></a>
                </div>
                <div class="welding-text">
                   {!! $production->second_content !!}
                </div>
                <div class="welding-steps">
                    <div class="welding-step">
                        <label class="welding-step-number">01.</label>
                        <p class="welding-step-text">
                           {{ $production->second_list_a }}
                        </p>
                    </div>

                    <div class="welding-step">
                        <label class="welding-step-number">02.</label>
                        <p class="welding-step-text">
                            {{ $production->second_list_b }}
                        </p>
                    </div>

                    <div class="welding-step">
                        <label class="welding-step-number">03.</label>
                        <p class="welding-step-text">
                            {{ $production->second_list_c }}
                        </p>
                    </div>
                </div>
            </section>

            <section id="personnel">
                <h2>@lang('texts.Производственный персонал')</h2>
                <div class="personnel-group">
                    <div class="personnel-description">
                        <div class="slider">
                            <div class="slick-slider">
                                {{-- <div class="siema"> --}}
                                    @if($personnel->images != null)
                                        @foreach(json_decode($personnel->images) as $v)
                                            <a data-fancybox="personnel-description-gallery" href="{{ Voyager::image($v) }}"><img src="{{ Voyager::image($v) }}" class="personnel-image swiper-slide"></a>
                                        @endforeach
                                    @endif
                                {{-- </div> --}}
                            </div>
                        <div class="previous slider-btn"></div>
                        <div class="next slider-btn"></div>
                        </div>

                        <div class="personnel-text">
                            {!! $personnel->content !!}
                        </div>
                    </div>
                    <div class="personnel-certificates slider">
                        <div class="certificate-images">
                            <button class="previous slider-btn"></button>
                            <button class="next slider-btn"></button>
                            <div class="cert-slider">
                                @foreach($personnelSliders as $slider)
                                    <div class="box">
                                        <a data-fancybox="personnel-certificates-gallery" href="{{ Voyager::image($slider->image) }}"><img src="{{ Voyager::image($slider->image) }}" alt="{{ $slider->description }}" class="certificate-image"></a>
                                        <p class="certificate-text">
                                            {{ $slider->description }}
                                         </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="certificate-text siema">
                            @foreach($personnelSliders as $slider)
                                <p class="certificate-text">
                                   {{ $slider->description }}
                                </p>
                            @endforeach --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </section>

            <section id="carcas-fittings">
                <h2>@lang('texts.Типы соединения каркасов')</h2>
                <div class="carcas-fittings-container">
                    <div class="carcas-text">
                        {!! $frameConnectionType->content !!}
                    </div>
                    <div class="slider">
                        {{-- <button class="previous slider-btn"></button>
                        <button class="next slider-btn"></button> --}}
                        <div class="hello-slider">
                            @if($frameConnectionType->images != null)
                                @foreach(json_decode($frameConnectionType->images) as $v)
                                    <a data-fancybox="carcas-fittings-gallery" href="{{ Voyager::image($v) }}"><img src="{{ Voyager::image($v) }}"  class="carcas-image"></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <section id="carcas-coating">
                <h2>@lang('texts.Типы покрытия для каркасов')</h2>
                <div class="carcas-coating">
                    {!! $coatingForFrame->text_left !!}
                    {!! $coatingForFrame->text_right !!}
                </div>
                <div class="carcas-packaging">
                    <h3 style="">{{ $coatingForFrame->title_images }}</h3>
                    <div class="carcas-packaging-group">
                        <p class="carcas-packaging-text">
                            {{ $coatingForFrame->text_bottom }}
                        </p>
                        @if($coatingForFrame->images != null)
                            <div class="carcas-packaging-images">
                                @foreach(json_decode($coatingForFrame->images) as $v)
                                    <div class="box">
                                        <a data-fancybox="carcas-coating-gallery" href="{{ Voyager::image($v) }}"><img src="{{ Voyager::image($v) }}" class="carcas-image" alt="упаковка каркасов"></a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <section id="carcas-specs">
                <h2>@lang('texts.Сводные технические характеристики каркасов')</h2>
                <div class="carcas-specs">

                    @foreach($summarySpecifications as $v)
                        <div class="carcas-spec">
                            <h3>{{ $v->title }}</h3>
                            {!! $v->content !!}
                        </div>
                    @endforeach

                </div>
                <div class="box slider">

                    {{-- <button class="previous slider-btn"></button>
                    <button class="next slider-btn"></button> --}}
                    <div class="carcas-slider">
                        @foreach($summarySpecificationSliders as $slider)
                            <a data-fancybox="carcas-specs-gallery" href="{{ Voyager::image($slider->image) }}"><img src="{{ Voyager::image($slider->image) }}" class="carcas-specs-image"></a>
                        @endforeach

                        
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="{{ asset('js/siema.js') }}"></script>
    <script>
        let introSlider = new Siema({
            selector: '#intro .siema',
            duration: 200,
            easing: 'ease-out',
            perPage: 1,
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => { },
            onChange: () => { },
        });

        document.querySelector('#intro .slider .previous').addEventListener('click', () => {
            introSlider.prev();
        });
        document.querySelector('#intro .slider .next').addEventListener('click', () => {
            introSlider.next();
        });

        let personnelCertificatesSlider = new Siema({
            selector: '.personnel-certificates .siema',
            duration: 200,
            easing: 'ease-out',
            perPage: {
                980: 2,
            },
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => { },
            onChange: () => { },
        });

        let personnelTextSlider = new Siema({
            selector: '#personnel .certificate-text.siema',
            duration: 200,
            easing: 'ease-out',
            perPage: {
                980: 2,
            },
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => { },
            onChange: () => { },
        });


        document.querySelector('.personnel-certificates .previous').addEventListener('click', () => {
            personnelCertificatesSlider.prev();
            personnelTextSlider.prev();
        });
        document.querySelector('.personnel-certificates .next').addEventListener('click', () => {
            personnelCertificatesSlider.next();
            personnelTextSlider.next();
        });

        let carcasSpecsSlider = new Siema({
            selector: '#carcas-specs .siema',
            duration: 200,
            easing: 'ease-out',
            perPage: 1,
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => { },
            onChange: () => { },
        });

        document.querySelector('#carcas-specs .slider .previous').addEventListener('click', () => {
            carcasSpecsSlider.prev();
        });
        document.querySelector('#carcas-specs .slider .next').addEventListener('click', () => {
            carcasSpecsSlider.next();
        });


        let carcasFittingsSlider = new Siema({
            selector: '#carcas-fittings .siema',
            duration: 200,
            easing: 'ease-out',
            perPage: 1,
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => { },
            onChange: () => { },
        });

        document.querySelector('#carcas-fittings .slider .previous').addEventListener('click', () => {
            carcasFittingsSlider.prev();
        });
        document.querySelector('#carcas-fittings .slider .next').addEventListener('click', () => {
            carcasFittingsSlider.next();
        });
    </script>

@endsection