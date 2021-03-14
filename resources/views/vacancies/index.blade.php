@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page">
           <section class="vacancies vacancies-inner" style="padding-bottom: 1px"> 
            <div class="container">
                <div class="vacancies-wrap">
                    <!-- <h1>@lang('texts.Требуются'):</h1> -->
                </div>
                <div class="vacancy-inner">
                    <div class="vacancy-left">
                        <div class="vacancies-subtitle">
                            <h2>{{ $model->name }}</h2>
                        </div>
                        <div class="vacancy-inner-top">
                            <div class="vacancy-wrapper">
                                <div class="vacancy-icon">
                                    <img src="{{ asset('icon/icon-vacancy.png') }}" alt="">
                                </div>
                                <div class="vacancy-text">
                                    <p>@lang('texts.Уровень зарплаты') </p>
                                    <p><b>{{ $model->salary }}</b></p>
                                </div>
                            </div>
                            <div class="vacancy-wrapper">
                                <div class="vacancy-icon">
                                    <img src="{{ asset('icon/icon-vacancy-2.png') }}" alt="">
                                </div>
                                <div class="vacancy-text">
                                    <p>@lang('texts.Требуемый опыт работы')</p>
                                    <p><b>{{ $model->required_experience }}</b></p>
                                </div>
                            </div>
                            <div class="vacancy-wrapper">
                                <div class="vacancy-icon">
                                    <img src="{{ asset('icon/icon-vacancy-3.png') }}" alt="">
                                </div>
                                <div class="vacancy-text">
                                    <p>@lang('texts.Город')</p>
                                    <p><b>{{ $model->city }}</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="vacancy-inform">
                            <h1>@lang('texts.Обязанности'):</h1>
                            {!! $model->responsibility !!}
                            <h1>@lang('texts.Условия')</h1>
                            {!! $model->condition !!}
                            <h1>@lang('texts.Ключевые навыки'):</h1>
                            {!! $model->key_skills !!}
                        </div>
                    </div>
                    <div class="vacancy-right">
                        <div class="vacancy-inform">
                            <h1>@lang('texts.Требования'):</h1>
                            {!! $model->requirements !!}
                        </div>
                    </div>
                </div>
                <center>
                <div class="blur fancy-border blur-vacancies" style="margin-top: 5rem;">
                                    <img src="/img/blur.png">
                                    <a href="/vacancies" class="more__vacancies">Вернуться</a>
                                </div>
                                </center>
            </div>
            
            
        </section>
    </main>

@endsection

