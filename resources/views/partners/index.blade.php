@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page partners-page partners-inner-page">
        <div class="container">
   
            <div class="main-title">
                <h1>{{ $page->getPage()->title }}</h1>
            </div>
            
            <div class="partners-inner">
                @foreach($model as $v)
                    <div class="partners partners-{{ $loop->last ? 'right' : 'left' }}">
                        <div class="partners-image" style="background-image: url({{ Voyager::image($v->background) }});">
                            <div class="partners-top">
                                <img src="{{ Voyager::image($v->image) }}" alt="{{ $v->name }}" width="100%">
                                <div class="partners-name">
                                    <h1>{{ $v->name }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="partners-text">
                            {!! $v->full_description !!}
                            <button class="button"></button>
                            <button class="button"></button>
                        </div>
                        <center class="inheight">
                            <div class="blur fancy-border blur-vacancies blur-partners">
                                <img src="/img/blur.png">
                                <a href="{{ $v->link }}" class="more__vacancies">Представительское удостоверение</a>
                            </div>
                    </center>
            </div>
                @endforeach
</div>
        </div>
    </main>

@endsection

