@extends('layouts.app')
@section('content')

    <main class="main-content catalog-page">
        <div class="container">

            <div class="main-title">
                <h3>{{ $model->name }}</h3>
            </div>

            <div class="catalog-breadcrumbs">
                <div class="breadcrumb">
                    <a href="{{ route('catalogs') }}">@lang('texts.Каталог')</a>
                </div>
                <div class="breadcrumb-active">
                    <a>{{ $model->name }}</a>
                </div>
            </div>

            <div class="catalog-filter">
                <div class="catalog-select">
                    <select name="category_id" id="industry-1">
                        <option value="null">@lang('texts.Не выбрано')</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="catalog-select">
                    <select name="industry_id" id="industry_id">
                        <option value="null">@lang('texts.Не выбрано')</option>
                        @foreach($industry_applications as $application)
                            <option value="{{ $application->id }}">{{ $application->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="catalog-select">
                    <select name="manufacturer_id" id="manufacturer_id">
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}" {{ $model->id == $manufacturer->id ? 'selected' : '' }}>
                                {{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="catalog-inner">
                @include('/partials/product', compact('products'))
            </div>
        </div>
    </main>

@endsection
