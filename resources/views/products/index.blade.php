@extends('layouts.app')
@section('content')
    <main id="equipment-page">
        <section class="intro">
            <div class="container">
                <h1>{{ $model->name }}</h1>
                <div id="breadcrumbs">
                    <div class="crumb">
                        <a href="{{ route('catalogs') }}">@lang('texts.Каталог')</a>
                    </div>
                    <div class="crumb">
                        <a href="{{ route('catalog', ['id' => $model->subcategory ? $model->subcategory->category_id : '']) }}">
                            {{ $model->subcategory ? ($model->subcategory->category ? $model->subcategory->category->name : '') : '' }}</a>
                    </div>
                    @if($model->subcategory)
                    <div class="crumb">
                        <a href="{{ route('catalog', ['id' => $model->subcategory->category_id]) }}?subcategory_id={{$model->subcategory->id}}">
                            {{ $model->subcategory ? $model->subcategory->name : '' }}</a>
                    </div>
                    @endif
                    <div class="crumb">
                        <a>{{ $model->name }}</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="equipment">
            <div class="equipment-tabs container">
                <div class="tabs-head">
                    <button class="description-switch active">@lang('texts.Описание')</button>
                    @if(str_replace(" ","",$model->specifications)!="")
                        <button class="characteristics-switch">@lang('texts.Характеристики')</button>
                    @endif
                    @if($documentation->count()>0)
                        <button class="documentation-switch">@lang('texts.Документация')</button>
                    @endif
                </div>
                <div class="tabs-body">
                    <div class="equipment-description tab active">
                        <div class="equipment-text flexscroll">
                            {!! $model->description_content !!}
                        </div>
                        <div class="equipment-showcase slider-container">
                            <button class="previous slider-btn"></button>
                            <button class="next slider-btn"></button>
                            <div class="product-slider">
                                @if($model->description_images != null)
                                    @foreach(json_decode($model->description_images) as $v)
                                    <a href="{{ Voyager::image($v) }}" data-fancybox='gallery_item'>
                                        <img src="{{ Voyager::image($v) }}" alt="">
                                    </a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="points"></div>
                        </div>
                    </div>
                    <div class="equipment-characteristics tab">
                        {!! $model->specifications !!}
                    </div>
                    <div class="equipment-documentation tab">
                        @php $row = $documentation->count() / 2.0 @endphp
                        <div class="document-list">
                            @php $m = 0;$n = 0; @endphp
                            @foreach($documentation as $v)
                                @php $m++@endphp
                                @if($row >= $m)
                                    @php $n++ @endphp
                                    @if($n % 2 == 1)
                                        <div class="document-group">
                                            @endif
                                            <div class="document">
                                                <img src="{{ Voyager::image($v->image) }}" alt="{{ $v->name }}">
                                                <a target="_blank"
                                                   href="{{ Voyager::image(json_decode($v->file)[0]->download_link) }}">{{ $v->name }}</a>
                                            </div>
                                            @if($n % 2 == 0)
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            @if($n % 2 != 0)
                        </div>
                        @endif
                    </div>
                    <div class="document-list">
                        @php $m = 0;$n = 0; @endphp
                        @foreach($documentation as $v)
                            @php $m++@endphp
                            @if($row < $m)
                                @php $n++ @endphp
                                @if($n % 2 == 1)
                                    <div class="document-group">
                                        @endif
                                        <div class="document">
                                            <img src="{{ Voyager::image($v->image) }}" alt="{{ $v->name }}" style="width: 35px; max-width: 35px; margin: 0;">
                                            <a target="_blank"
                                               href="{{ Voyager::image(json_decode($v->file)[0]->download_link) }}">{{ $v->name }}</a>
                                        </div>
                                        @if($n % 2 == 0)
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        @if($n % 2 != 0)
                    </div>
                    @endif
                </div>
            </div>
            </div>
            </div>
        </section>

        @if($related_products->count() > 0)
            <section class="equipment-related">
                <div class="container">
                    <h2>@lang('texts.Сопутствующие товары')</h2>
                    <div class="slider-container">
                        <button class="previous slider-btn"></button>
                        <button class="next slider-btn"></button>
                        <ul class="siema slider siemals">
                            @foreach($related_products as $v)
                                @if($v)
                                    @php
                                        $product = $v->translate(app()->getLocale());
                                    @endphp
                                    <li class="first">
                                        <a href="{{ route('product', ['id' => $product->id]) }}" class="box">
                                            <img src="{{ Voyager::image($product->image) }}" alt="{{ $product->name }}">

                                        <label class="equipment-related-name">
                                            <a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                        </label>
                                    </a>

                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif
    </main>

    <script src="{{ asset('js/siema.js') }}"></script>
    <script>
        let descriptionSwitch = document.querySelector('.description-switch');
        let activeSwitch = descriptionSwitch;
        let characteristicsSwitch = document.querySelector('.characteristics-switch');
        let documentationSwitch = document.querySelector('.documentation-switch');
        
        descriptionSwitch.addEventListener('click', () => {
            setActiveSwitch(descriptionSwitch);
            setActiveTab(document.querySelector('.equipment-description'));
        });

        characteristicsSwitch.addEventListener('click', () => {
            setActiveSwitch(characteristicsSwitch);
            setActiveTab(document.querySelector('.equipment-characteristics'));
        });

        documentationSwitch.addEventListener('click', () => {
            setActiveSwitch(documentationSwitch);
            setActiveTab(document.querySelector('.equipment-documentation'));
        });

        function setActiveSwitch(_switch) {
            activeSwitch.classList.remove('active');
            activeSwitch = _switch;
            activeSwitch.classList.add('active');
        }

        function setActiveTab(tab) {
            document.querySelector('.tab.active').classList.remove('active');
            tab.classList.add('active');
        }

        // create a dot for each slide
        let numSlides = document.querySelector('.equipment-showcase .siema').children.length;
        const pointsContainer = document.querySelector('.equipment-showcase .points');
        for (let i = 0; i < numSlides; i++) {
            const el = document.createElement('div');
            el.classList.add('point');
            pointsContainer.appendChild(el);
        }
        let activeDot = pointsContainer.children[0];
        pointsContainer.children[0].classList.add('active');

        // equipment slider buttons
        document.querySelector('.equipment .previous').addEventListener('click', () => {
            equipmentSlider.prev();
            if (activeDot.previousElementSibling !== null) {
                activeDot.classList.remove('active');
                activeDot = activeDot.previousElementSibling;
                activeDot.classList.add('active');
            }
        });
        document.querySelector('.equipment .next').addEventListener('click', () => {
            equipmentSlider.next();
            if (activeDot.nextElementSibling !== null) {
                activeDot.classList.remove('active');
                activeDot = activeDot.nextElementSibling;
                activeDot.classList.add('active');
            }
        });

        let equipmentSlider = new Siema({
            selector: '.equipment-showcase .siema',
            duration: 200,
            easing: 'ease-out',
            perPage: 1,
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: false,
            rtl: false,
            onInit: () => {
            },
            onChange: () => {
            },
        });

        let relatedEquipmentSlider = new Siema({
            selector: '.equipment-related .siema',
            duration: 200,
            easing: 'ease-out',
            perPage: {
                560: 2,
                980: 4,
            },
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: false,
            rtl: false,
            onInit: () => {
            },
            onChange: () => {
            },
        });

        document.querySelector('.equipment-related .previous').addEventListener('click', () => {
            relatedEquipmentSlider.prev();
        });
        document.querySelector('.equipment-related .next').addEventListener('click', () => {
            relatedEquipmentSlider.next();
        });

        // hide related equipment slider buttons
        if (document.querySelectorAll('.equipment-related img').length <= 4) {
            document.querySelectorAll('.equipment-related .slider-btn').forEach((btn, _) => {
                btn.style.display = 'none';
            })
            document.querySelector('.equipment-related .slider-container').style.padding = '0';
            document.querySelector('.equipment-related h2').style.padding = '0';
        }
    </script>


@endsection
