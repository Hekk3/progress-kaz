@extends('layouts.app')
@section('content')

<main class="main-content catalog-page services">
    <section class="service">
        <div class="container">
            <div class="service-wrap">

                <div class="main-title">
                    <h3>{!! $page->getPage()->title !!}</h3>
                    <div class="placeholder">This is here because someone made it align the slider</div>
                </div>

                <div class="slider__frames1"></div>
                <div class="slider__frames2"></div>

                <div class="main-slider-wrapper">
                    <div class="main-slider">
                        @foreach($model as $keyxs=>$v)
                        <div class="main-slider__item">
                            <div class="main-slider__item-wrap">
                                <div class="top-slide">
                                    <div class="item-wrap__img">
                                        <img src="{{ Voyager::image($v->image) }}" alt="Image">
                                    </div>
                                    <div class="slide-caption">
                                        <div class="title-with-icon">
                                            <div class="icon">
                                                @if(json_decode($v->icon) != null)
                                                <img src="{{ Voyager::image(json_decode($v->icon)[0]->download_link) }}" alt="{{ $v->name }}">
                                                @endif
                                            </div>
                                            <p>{{ $v->name }}</p>
                                        </div>

                                        <div class="slider-content">
                                            {!! $v->description !!}
                                        </div>
                                    </div>
                                </div>

                                @php $types = $v->types @endphp
                                <div class="under-slide-wrap">
                                    <div class="under-slide">
                                        @if(count($types) > 0)
                                        @foreach($types as $type)
                                        <div class="under-slide__item">
                                            <div class="under-slide__item-img">
                                                <a data-fancybox="gal{{$keyxs}}" href="{{ Voyager::image($type->image) }}">
                                                    <img src="{{ Voyager::image($type->image) }}" alt="{{ $type->translate(app()->getLocale())->text }}">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.main-slider -->

            </div>
            <!-- /.service-wrap -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.service -->

</main>

@endsection