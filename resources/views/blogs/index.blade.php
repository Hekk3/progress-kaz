@extends('layouts.app')
@section('content')

    <main class="main-content news-inner-page catalog-page">
        <div class="container">
            <div class="main-title">
                <h1>{{ $model->name }}</h1>
            </div>
            <div class="news-inner">
                <div class="news-left">
                    <div class="news-for">
                        @if($model->sliders != null)
                            @foreach(json_decode($model->sliders) as $v)
                                <a href="{{ Voyager::image($v) }}" class="news-image-magnific">
                                    <img src="{{ Voyager::image($v) }}" alt="">
                                </a>
                            @endforeach
                        @endif
                    </div>
                    <div class="news-nav">
                        @if($model->sliders != null)
                            @foreach(json_decode($model->sliders) as $v)
                                <a href="{{ Voyager::image($v) }}" class="news-image-magnific">
                                    <img src="{{ Voyager::image($v) }}" alt="">
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="news-right">
                    <div class="news-content">
                      {!! $model->first_block !!}
                    </div>
                </div>
            </div>

            <div class="news-content">
                {!! $model->second_block !!}
            </div>

            @if($model->third_block != '')
                <div class="news-content-bottom">
                    <p>{{ $model->third_block }}</p>
                </div>
            @endif
            <center style="padding-bottom: 60px;">
            <div class="blur fancy-border blur-vacancies" style="margin-bottom: 30px">
                                    <img src="/img/blur.png">
                                    <a href="/blogs/" class="more__vacancies">Вернуться</a>
                                </div>
            </center>
        </div>
    </main>

@endsection
