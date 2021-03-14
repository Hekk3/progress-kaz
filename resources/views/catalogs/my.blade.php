@extends('layouts.app')
@section('content')
<div class="main-content catalog-page catalog-root">
    <div class="container">
        <div class="main-title">
            <h3>{{ $page->getPage()->title }}</h3>
        </div>
        <div class="catalog__row">
            @foreach($g_categories as $v)
            <div class="catalog__column">
            <a href="{{ route('catalog', ['id' => $v->id]) }}">
                <div class="catalog-info">
                    <div class="catalog-image">
                        <img src="{{ Voyager::image($v->image) }}" alt="{{ $v->name }}">
                    </div>
                    <div class="catalog-content">
                        <h1>{{ $v->name }}</h1>
                    </div>
                </div>
            </a>
        </div>
            @endforeach
            <div class="catalog-bottom">
                <div class="catalog-bottom__row">
                    @foreach($subCategories as $v)
                    <div class="catalog-bottom__column">
                        <a href="{{ route('catalog', ['id' => $v->id]) }}">
                            <div class="catalog-info">
                                <div class="catalog-image">
                                    <img src='{{ Voyager::image($v->image) }}' alt="{{ $v->name }}">
                                </div>
                                <div class="catalog-content">
                                    <h1>{{ $v->name }}</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection