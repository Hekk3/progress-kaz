<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="https://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $page->getMeta()->description}}">
    <meta name="keyword" content="{{ $page->getMeta()->keyword }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page->getMeta()->title }}</title>
    <meta name="base" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/dest/preview.jpg') }}">

    <script>
        window.addEventListener('load', () => {
            $('#preloader').fadeOut('slow');
            document.body.style.display = 'block';
        });
    </script>


    <script src="{{ asset('libs/html5shiv/es5-shim.min.js') }}"></script>
    <script src="{{ asset('libs/html5shiv/html5shiv.min.js') }}"></script>
    <script src="{{ asset('libs/html5shiv/html5shiv-printshiv.min.js') }}"></script>
    <script src="{{ asset('libs/respond/respond.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="shortcut icon" href="{{ asset('icon/icon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('icon/icon.ico') }}" type="image/x-icon">
</head>

<body style="{{setting('site.bg_color')!=""?'background:'.setting('site.bg_color').';':""}}">

<div id="preloader">
    <div class="preloader-container">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
    </div>
</div>
<div class="wrapper">
    <div class="wrapper-in">
    <header>
            <div class="container header-container">
                <div class="header-logo">
                    <a href="{{ route('home') }}" style="display:contents;">
                        <img src="{{ Voyager::image(setting('site.logo')) }}" alt="Главная" class="logo logo-navbar">
                    </a>
                </div>
                <nav>
                    <button class="nav-close-btn">
                        <img src="{{ asset('images/icons/nav-close-btn-icon.png') }}" alt="Закрыть">
                    </button>

                    @foreach (menu('site', '_json') as $menuItem)
                        @php $menuItem = $menuItem->translate(app()->getLocale()) @endphp

                        <div class="equipment-wrapper {{ $menuItem->icon_class }}">
                            <a href="{{ $menuItem->url }}" class="equipment">{{ $menuItem->title }}</a>
                            @if(count($menuItem->children) != 0)
                                <div class="in-menu">
                                    <div class="container">
                                    <button class="nav-inner-close-btn">
                                        <img src="{{ asset('images/icons/nav-close-btn-icon.png') }}" alt="Закрыть меню">
                                    </button>
                                        <div class="row">
                                            @if(count($menuItem->children) > 3)
                                                @php $m = 0 @endphp
                                                @foreach($menuItem->children as $menuSubItem)
                                                    @php
                                                        $m++;
                                                        $menuSubItem = $menuSubItem->translate(app()->getLocale())
                                                    @endphp
                                                    @if($m % (count($menuItem->children) / 3) == 1)
                                                        <div class="col-lg-4">
                                                            @endif
                                                            <div class="one-ul">
                                                                <img class="icon" src="/{{ $menuSubItem->icon_class }}"
                                                                     alt="partnership icon">
                                                                <div class="the-ul">
                                                                    <ul class="flex">
                                                                        <li class="title-ul">
                                                                            <a href="{{ $menuSubItem->url }}">{{ $menuSubItem->title }}</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @if($m % (count($menuItem->children) / 3) == 0)
                                                        </div>
                                                    @endif
                                                @endforeach

                                                @if($m % (count($menuItem->children) / 3) != 0)
                                        </div>
                                        @endif
                                        @else
                                            @foreach($menuItem->children as $menuSubItem)
                                                @php $menuSubItem = $menuSubItem->translate(app()->getLocale()) @endphp
                                                <div class="col-lg-4">
                                                    <div class="one-ul">
                                                        <img class="icon" src="/{{ $menuSubItem->icon_class }}"
                                                             alt="partnership icon">
                                                        <div class="the-ul">
                                                            <ul class="flex">
                                                                <li class="title-ul">
                                                                    <a href="{{ $menuSubItem->url }}">{{ $menuSubItem->title }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                        </div>
                        @elseif($menuItem->url == '/catalogs')
                            <div class="in-menu">
                                <div class="container">
                                <button class="nav-inner-close-btn">
                                    <img src="{{ asset('images/icons/nav-close-btn-icon.png') }}" alt="Закрыть меню">
                                </button>
                                    <div class="row">
                                        @php $row = $g_categories->count() / 3.0 @endphp
                                        <div class="col-lg-4">
                                            @php $m = 0 @endphp
                                            @foreach($g_categories as $category)
                                                @php
                                                    $m++;
                                                    $subcategories = $category->subcategories;
                                                    App\Helpers\TranslatesCollection::translate($subcategories, app()->getLocale())
                                                @endphp
                                                @if($row > $m)
                                                    <div class="one-ul">
                                                        <div class="pic">
                                                            <img src="{{ Voyager::image($category->icon) }}"
                                                                 class="equipment-filtration-icon"
                                                                 alt="{{ $category->name }}">
                                                        </div>
                                                        <div class="the-ul">
                                                            <ul>
                                                                <div class="title-ul"><a
                                                                            href="{{ route('catalog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                                </div>
                                                                @foreach($subcategories as $subcategory)
                                                                    <li>
                                                                        <a href="{{ route('catalog', ['id' => $category->id]) }}?subcategory_id={{ $subcategory->id }}">
                                                                            {{ $subcategory->name }}</a>
                                                                        @php
                                                                            $products = $subcategory->products;
                                                                            App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                                                                        @endphp
                                                                        @if(count($products) > 0)
                                                                            <ul class="bottom-addition">
                                                                                @foreach($products as $product)
                                                                                    @if($product->on_header)
                                                                                        <li>
                                                                                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                                                                                {{ $product->name }}</a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="col-lg-4">
                                            @php $m = 0 @endphp
                                            @foreach($g_categories as $category)
                                                @php
                                                    $m++;
                                                    $subcategories = $category->subcategories;
                                                    App\Helpers\TranslatesCollection::translate($subcategories, app()->getLocale())
                                                @endphp
                                                @if($row <= $m && 2*$row+1 >= $m)
                                                    <div class="one-ul one-ul-two" style="margin-bottom: 21px;">
                                                        <div class="pic">
                                                            <img src="{{ Voyager::image($category->icon) }}"
                                                                 class="equipment-filtration-icon"
                                                                 alt="{{ $category->name }}">
                                                        </div>
                                                        <div class="the-ul">
                                                            <ul>
                                                                <div class="title-ul"><a
                                                                            href="{{ route('catalog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                                </div>
                                                                @foreach($subcategories as $subcategory)
                                                                    <li>
                                                                        <a href="{{ route('catalog', ['id' => $category->id]) }}?subcategory_id={{ $subcategory->id }}">
                                                                            {{ $subcategory->name }}</a>
                                                                        @php
                                                                            $products = $subcategory->products;
                                                                            App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                                                                        @endphp
                                                                        @if(count($products) > 0)
                                                                            <ul class="bottom-addition">
                                                                                @foreach($products as $product)
                                                                                    @if($product->on_header)
                                                                                        <li>
                                                                                            <a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            @php $m = 0 @endphp
                                            @foreach($g_categories as $category)
                                                @php
                                                    $m++;
                                                    $subcategories = $category->subcategories;
                                                    App\Helpers\TranslatesCollection::translate($subcategories, app()->getLocale())
                                                @endphp
                                                @if(2*$row+1 < $m)
                                                    <div class="one-ul">
                                                        <div class="pic">
                                                            <img src="{{ Voyager::image($category->icon) }}"
                                                                 class="equipment-filtration-icon"
                                                                 alt="{{ $category->name }}">
                                                        </div>
                                                        <div class="the-ul">
                                                            <ul>
                                                                <div class="title-ul"><a
                                                                            href="{{ route('catalog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                                </div>
                                                                @foreach($subcategories as $subcategory)
                                                                    <li>
                                                                        <a href="{{ route('catalog', ['id' => $category->id]) }}?subcategory_id={{ $subcategory->id }}">
                                                                            {{ $subcategory->name }}</a>
                                                                        @php
                                                                            $products = $subcategory->products;
                                                                            App\Helpers\TranslatesCollection::translate($products, app()->getLocale())
                                                                        @endphp
                                                                        @if(count($products) > 0)
                                                                            <ul class="bottom-addition">
                                                                                @foreach($products as $product)
                                                                                    @if($product->on_header)
                                                                                        <li>
                                                                                            <a href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endif
            </div>
            @endforeach

            <div class="blur fancy-border blur-vacancies blur-main" style="margin-top: 2.5rem;">
                <img src="{{ asset('/img/blur.png') }}">
                <a href="{{ route('contact-us') }}" class="more__vacancies more__main"> @lang('texts.Оставить заявку')</a>
            </div>
            {{-- <a href="{{ route('contact-us') }}" class="request request-mobile transparent-border blur">
                <img class="highlight-white" src="{{ asset('images/blur.png') }}">
                    @lang('texts.Оставить заявку')
                </a> --}}
            </nav>

                           {{-- <div class="search transparent-border">--}}
            {{--                    <input type="text" placeholder="поиск">--}}
                               {{-- <button><img src="{{ asset('images/zoom.svg') }}" alt=""></button> --}}
                           {{-- </div> --}}
            <div class="header-group">
                <form method="get" action="{{ route('catalogsSearch') }}" class="header-search transparent-border">
                    <input type="text" name="keyword" id="search-input" placeholder="ПОИСК">
                    <a href="#0" class="icon-search">
                        <img src="{{ asset('images/icons/icon-search.png') }}" alt="search icon">
                    </a>
                </form>
                <div class="header__sitemap">
                    <a href="/maps">
                    <img src="{{ asset('images/sitemap.svg') }}" alt="Карта сайта">
                </a>
                </div>
                <div class="header-phone">
                    <a href="#0" class="icon-phone">
                        <img src="{{ asset('images/call-icon.svg') }}" alt="call icon">
                    </a>
                    <div class="contacts-text">
                        <p class="business-hours">{{ $workingHour->text }}</p>
                        <a href="tel:{{ setting('site.first_phone') }}"
                           class="call-number">{{ setting('site.first_phone') }}</a>
                    </div>
                </div>
                <div class="request-container blur">
                    <img class="highlight-white" src="{{ asset('images/blur.png') }}">
                    <a href="{{ route('contact-us') }}"
                       class="request transparent-border">@lang('texts.Оставить заявку')</a>
                </div>
            </div>

            <a href="#0" class="nav-mobile-toggle" aria-haspopup="true" aria-expanded="false"
               aria-label="Sections Navigation">
                <div class="burger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </a>
            <div class="out-of-menu"></div>
    </div>
    </header>
   
