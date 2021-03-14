@extends('layouts.app')
@section('content')
<main class="main-content catalog-page sitemap">
    <div class="container">
        <h1>Карта сайта</h1>
        <div class="sitemap__row">
            <div class="sitemap__main">
                @foreach($sitelinks as $link)
                <div class="sitemap__tab">
                    <h2><a href="{{$link->link}}" class="sitemap__title">{{$link->title}}</a></h2>
                    <ul class="sitemap__list">
                        @foreach($link->childs as $child)
                        <li><a href="{{$child->link}}">{{$child->title}}</a></li>
                            @foreach($child->childs as $subchild)
                            <li class="sitemap__sublist"><a href="{{$subchild->link}}">{{$subchild->title}}</a></li>
                            @endforeach
                        @endforeach
                        
                        
                    </ul>
                </div>
                @endforeach
                
            </div>
            
        </div>
    </div>
</main>
<style>
    .sitemap__main{
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
        width:100%;
    }
    .sitemap__tab{
        width: 50%;
        
    }
</style>
@endsection
