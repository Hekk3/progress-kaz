@extends('layouts.app')
@section('content')

<main id="news-page">
    <div class="container">
        <h1 class="page-title">{{ $page->getPage()->title }}</h1>
        <div id="news" class="slider">
            <ul class="slick-sliders">

                @foreach($model as $v)
                <li class="news-item">
                    <a href="{{ route('inner_news', ['id' => $v->id]) }}">
                        <div class="img-container">
                            <img data-lazy="{{ Voyager::image($v->image) }}" class="news-item-image" alt="{{ $v->name }}">
                            <span class="date">{{ \Carbon\Carbon::parse($v->created_at)->format('j F Y') }}</span>
                        </div>
                        <h2>{{ $v->name }}</h2>
                        {!! $v->short_description !!}
                        <div class="blur fancy-border blur-vacancies">
                                    <img src="/img/blur.png">
                                    <a href="{{ route('inner_news', ['id' => $v->id]) }}" class="more__vacancies">Подробнее</a>
                                </div>
                    </a>
                </li>
                @endforeach

            </ul>
             <div class="slider-controls">
                <div class="arrows-news" style="position: absolute; bottom: 5%; left: 31%;">
                    <button class="previous"></button>
                </div>
                <div class="slider-dots noselect">
                </div>
                <div class="arrows-news" style="position: absolute; bottom: 5%; right: 29%;">
                    <button class="next next-sliders" style="margin-right: 3em;"></button>
                </div>
                <span class="news-total">@lang('texts.Всего', ['amount' => $model->count()])</span>
            </div>
            <button class="previous slider-btn">
                <img src="{{ asset('images/icons/left.png') }}" alt="">
            </button>
            <button class="next slider-btn">
                <img src="{{ asset('images/icons/right.png') }}" alt="">
            </button>
        </div>

        <div class="row">

        
        {{-- <div class="copyright-block">
                <div class="soc-block soc-visible">
                    <p style="font-size: 18px; font-weight: bold; width: 100%; text-transform: capitalize; margin: 0 0 10px 35px; " data-toggle="modal" data-target="#exampleModalLong">
                        Поделиться
                    </p>
                    <div class="social-fc-links">
                        <i data-toggle="modal" data-target="#exampleModalLong" class="fa fa-share-square"></i>
                        <div class="ya-share2 ya-share2_inited" data-services="vkontakte,facebook,twitter,viber,telegram"><div class="ya-share2__container ya-share2__container_size_m ya-share2__container_color-scheme_normal ya-share2__container_shape_normal"  style="padding-left:30px;"><ul class="ya-share2__list ya-share2__list_direction_horizontal"><li class="ya-share2__item ya-share2__item_service_vkontakte"><a class="ya-share2__link" href="https://vk.com/" rel="nofollow noopener" target="_blank" title="ВКонтакте"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">ВКонтакте</span></a></li><li class="ya-share2__item ya-share2__item_service_facebook"><a class="ya-share2__link" href="https://www.facebook.com/" rel="nofollow noopener" target="_blank" title="Facebook"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Facebook</span></a></li><li class="ya-share2__item ya-share2__item_service_twitter"><a class="ya-share2__link" href="https://twitter.com/" rel="nofollow noopener" target="_blank" title="Twitter"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Twitter</span></a></li><li class="ya-share2__item ya-share2__item_service_viber"><a class="ya-share2__link" href="viber://" rel="nofollow" target="_blank" title="Viber"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Viber</span></a></li><li class="ya-share2__item ya-share2__item_service_telegram"><a class="ya-share2__link" href="https://t.me/" rel="nofollow noopener" target="_blank" title="Telegram"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Telegram</span></a></li></ul></div></div>
                    </div>
                    
                    
                </div>
                <p>Copyright © 2010-{{ date('Y') }}. <span>Все права защищены</span></p>
            </div>

            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="soc-icons">
                            <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-services="vkontakte,facebook,twitter,viber,telegram" style="margin-left:15px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

            {{-- <div class="slider-controls">
                <div class="arrows-news" style="padding: 0.55em 2.9em;">
                    <button class="previous"></button>
                </div>
                <div class="slider-dots noselect">
                </div>
                <div class="arrows-news" style="padding: 0.55em 2.44em">
                    <button class="next next-sliders" style="margin-right: 3em;"></button>
                </div>
                <span class="news-total">@lang('texts.Всего', ['amount' => $model->count()])</span>
            </div> --}}
        </div>
    </div>
</main>
@endsection