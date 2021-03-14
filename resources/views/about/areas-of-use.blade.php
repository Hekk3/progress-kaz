@extends('layouts.app')
@section('content')

    <main class="application-area">
        <h1 class="application-title-info">Области применения оборудования</h1>
        <div class="application-inner">
            @php
                $ea=   \App\EquipmentArea::get();
            @endphp
            @foreach($ea as $keyxs=>$equi)
                <div class="application-link {{$keyxs==0?'application-left':(count($ea)-1==$keyxs?'application-right application-right-2':'application-medium')}}" style="width:14.28%">
                    <div class="application-link-bg-container">
                        <div style="background-image: url({!!  Voyager::image($equi->background) !!});" class="application-link-bg"></div>
                    </div>
                    <div class="application-link-content">
                        <div class="application-title">
                            <img class="application-link-image" src="{!!  Voyager::image($equi->image) !!}" alt="">
                            <h1>{{$equi->name}}</h1>
                            <p>{!! $equi->full_description !!}</p>
                            
                            <div align="center" style="margin-top: -10px;">
                            <div class="blur fancy-border blur-vacancies">
                                    <img src="/img/blur.png">
                                    <a href="/catalogs/1?industry_id={{$equi->industry_application_id}}" class="more__vacancies">Каталог</a>
                                </div>
                            </div> 

                            <button class="button more" alt="Каталог"></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mobile-application">
            @foreach(\App\EquipmentArea::get() as $keyxs=>$equi)
                <div class="application-link {{$keyxs==0?'application-left':'application-medium'}} ">
                    <div class="application-link-bg-container">
                        <div class="application-link-bg" style="background-image: url({!!  Voyager::image($equi->background) !!});background-position: center center; background-size: cover; transition: 1s all;"></div>
                    </div>
                    <div class="application-link-content">
                        <div class="application-title">
                            <img class="application-link-image" src="{!!  Voyager::image($equi->image) !!}" alt="">
                            <h1>{{$equi->name}}</h1>
                        <p>{!! $equi->full_description !!}</p>
                        <div class="blur fancy-border blur-vacancies">
                                    <img src="/img/blur.png">
                                    <a href="/catalogs/1?industry_id={{$equi->industry_application_id}}" class="more__vacancies">Каталог</a>
                                </div>
                            <button class="button more"></button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </main>

@endsection

