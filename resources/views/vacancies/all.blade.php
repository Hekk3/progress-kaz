@extends('layouts.app')
@section('content')


    <main class="main-content catalog-page vacancies-page">
        <section class="vacancies">
            <div class="container">
                <div class="vacancies-wrap" >
                    <h1>{{ $page->getPage()->title }}</h1>
                    <div class="vacancies-items-wrap">
                        @foreach($model as $v)
                            <div class="vacancies-item__wrap">
                                <div class="vacancies-item__name">
                                    <h4>{{ $v->name }}</h4>
                                    <p>г. {{ $v->city }}</p>
                                    <div class="vacancies-item__name--description">
                                       {!! $v->short_description !!}
                                    </div>
                                    <div class="vacancies-item__name--conditions">
                                        <p>@lang('texts.ЗП'): <span>{{ $v->salary }}</span></p>
                                        <p>@lang('texts.График'): <span>{{ $v->schedule }}</span></p>

                                        <div class="blur fancy-border blur-vacancies">
                                    <img src="./img/blur.png">
                                    <a href="{{ route('vacancy', ['id' => $v->id]) }}" class="more__vacancies">@lang('texts.Подробнее')</a>
                                </div>

                                    </div> 
                                </div>
                                <!-- <div class="vacancies-item__btn">
                                    <div class="btn-wrap">
                                        <a href="{{ route('vacancy', ['id' => $v->id]) }}" class="btn">@lang('texts.Подробнее о вакансии')</a>
                                    </div>
                                </div> -->
                            </div>
                        @endforeach
                    </div>
                    <!-- /.vacancies-items -->
                </div>
            </div>
            <!-- /.container -->
        </section>
        <!-- /.vacancies -->
    </main>

@endsection
