@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page download-center">

        <section class="download-info">
            <div class="container">

                <div class="download-info__wrap">

                    <h1>{{ $page->getPage()->title }}</h1>

                    <div class="download-info-tabs-wrapper">
                        <div class="download-info-tabs">
                            <span class="tab" data-hash="#catalog">@lang('texts.Каталоги')</span>
                            <span class="tab" data-hash="#presentations">@lang('texts.Презентации')</span>
                            <span class="tab" data-hash="#lists">@lang('texts.Опросные листы')</span>
                            <span class="tab" data-hash="#video">@lang('texts.Видео')</span>
                        </div>
                        <div class="download-info-tab_content">
                            <div class="tab_item">
                                <div class="catalog-items">
                                    @foreach($catalogs as $catalog)
                                        <div class="catalog-item-wrap">
                                            <div class="catalog-item">
                                            <a href="{{ Voyager::image(json_decode($catalog->file)[0]->download_link) }}" target="_blank">
                                                <div class="catalog-item__img">
                                                    @if($catalog->icon)
                                                        <img src="{{ Voyager::image($catalog->icon->image) }}" alt="Файл">
                                                    @endif
                                                </div>
                                            </a>
                                            </div>
                                            <h3>{{ $catalog->name }}</h3>
                                            <a href="{{ Voyager::image(json_decode($catalog->file)[0]->download_link) }}" class="download-btn" target="_blank">
                                                {{ $catalog->file_type }}
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab_item">
                                <div class="catalog-items">

                                    @foreach($presentations as $presentation)
                                        <div class="catalog-item-wrap">
                                            <div class="catalog-item">
                                            <a href="{{ Voyager::image(json_decode($presentation->file)[0]->download_link) }}"  target="_blank">
                                                <div class="catalog-item__img">
                                                    @if($presentation->icon)
                                                        <img src="{{ Voyager::image($presentation->icon->image) }}" alt="Файл">
                                                    @endif
                                                </div>
                                            </a>
                                            </div>
                                            <h3>{{ $presentation->name }}</h3>
                                            <a href="{{ Voyager::image(json_decode($presentation->file)[0]->download_link) }}" class="download-btn" target="_blank">
                                                {{ $presentation->file_type }}
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab_item">
                                <div class="download-lists">

                                    @foreach($questionnaires as $questionnaire)
                                        <div class="download-lists__item">
                                        <a href="{{ Voyager::image(json_decode($questionnaire->file)[0]->download_link) }}" target="_blank">
                                            <div class="download-lists__item-img">
                                                @if($questionnaire->icon)
                                                    <img src="{{ Voyager::image($questionnaire->icon->image) }}" alt="Документ">
                                                @endif
                                            </div>
                                        </a>
                                            <p>
                                                <a href="{{ Voyager::image(json_decode($questionnaire->file)[0]->download_link) }}" target="_blank">
                                                    {{ $questionnaire->name }}</a></p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab_item videos">
                                <iframe width="50%" src="https://www.youtube.com/embed/8eFBoYVTLTI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <iframe width="50%" src="https://www.youtube.com/embed/8eFBoYVTLTI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.download-info__wrap -->

            </div>
            <!-- /.container -->
        </section>
        <!-- /.donwload-info -->
    </main>

@endsection

