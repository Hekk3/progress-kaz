@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page">

        <section class="contacts" style="position: relative;">
            <div class="container">

                <div class="contacts-wrap">
                    <h1>{{ $page->getPage()->title }}</h1>

                    <div class="contacts-left-right">
                        <div class="contacts-info">
                            <h3>Товарищество с ограниченной
                                ответственностью<br>
                                «ПрогрессКазИнжиниринг»</h3>

                            <div class="contacts-info__item">
                                <h6>@lang('texts.Юридический, фактический и почтовый адрес')</h6>
                                {!! $address->text !!}
                            </div>

                            <div class="contacts-info__item">
                                <h6>@lang('texts.Телефон')</h6>
                                <a href="tel:{{ setting('site.first_phone') }}">{{ setting('site.first_phone') }}</a>
                                <h6>@lang('texts.Факс')</h6>
                                <a href="tel:{{ setting('site.second_phone') }}">{{ setting('site.second_phone') }}</a>
                            </div>

                            <div class="contacts-info__item">
                                <h6>E-mail</h6>
                                <a href="mailto:office@pke.kz">{{ setting('site.email') }}</a>
                            </div>

                            <div class="contacts-info__item contacts-info__item--indigo">
                                {!! $requisite->text !!}
                            </div>

                        </div>
                        <!-- /.contacts-info -->

                        @if(app()->isLocale('en'))
                            @php $lang = 'en_US' @endphp
                        @elseif(app()->isLocale('kz'))
                            @php $lang = 'kz_KZ' @endphp
                        @else
                            @php $lang = 'ru_RU' @endphp
                        @endif

                        <div class="contacts-map">
                            <div id="map" class="map" width="560" height="430" frameborder="1" allowfullscreen="true" style="position:relative;">
                            </div>
                        </div>
                        <!-- /.contacts-map -->
                    </div>

                </div>
                <!-- /.contacts-wrap -->

            </div>
            <!-- /.container -->
        </section>
        <!-- /.contacts -->

    </main>

@endsection

