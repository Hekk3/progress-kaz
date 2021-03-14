@extends('layouts.app')
@section('content')

    <main id="home-page">

        <div class="content">
            <div class="circle"></div>
            @php
                $json_arra=[];
            @endphp
            <div class="my-slider">
                @foreach(\App\Slider::get() as $index=>$slid)
                @php $asyl_var = $loop->index; @endphp
                    <div class="my-slide logo sl-dry child-dry-{{$loop->index}}  @if($index==0) sl-active @endif sl-1" data-slide="{{$slid->id}}">
                        <div class="row row-main">
                            <div class="col-lg-6 col-md-6 main-text col-text">
                                {!! $slid->content !!} 
                                <div class="blur fancy-border mobile-visible">
                                    <img src="./img/blur.png">
                                    <a href="{{ $slid->url }}" class="more">Подробнее</a>
                                </div>
                            </div>
                            <div class="main-images   featured-images">
                                @php $new_images = json_decode($slid->additional_images) @endphp
                                @if($slid->additional_images != null)
                                @foreach($new_images as $image)
                                <img class="dry-pic pic-{{$loop->index+1}} parent-{{$asyl_var}}" src="{{asset('storage/'.$image)}}" alt="">
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @php
                        array_push($json_arra,["id"=>$slid->id,"text"=>is_null($slid->title_mini)?$slid->title:$slid->title_mini]);
                    @endphp
                @endforeach
            </div>
            <div id="mitiTitle" style="display: none;">{{json_encode($json_arra)}}</div>
            <div class="copyright-block">
                <div class="soc-block soc-visible">
                    <div class="blur fancy-border blur-vacancies mobile-visible">
                        <img src="./img/blur.png">
                        <a href="#" class="more__vacancies" data-toggle="modal" data-target="#exampleModalLong" style="padding: 0.15em 2em;">@lang('texts.Поделиться')</a>
                    </div>
                    <div class="social-link">
                    <div class="social-fc-links" style="margin-top: 6px;">
                        <i data-toggle="modal" data-target="#exampleModalLong" class="fa fa-share-square"></i>
                        <div class="ya-share2 ya-share2_inited" data-services="vkontakte,facebook,twitter,instagram,telegram"><div class="ya-share2__container ya-share2__container_size_m ya-share2__container_color-scheme_normal ya-share2__container_shape_normal"><ul class="ya-share2__list ya-share2__list_direction_horizontal"><li class="ya-share2__item ya-share2__item_service_vkontakte"><a class="ya-share2__link" href="https://vk.com/" rel="nofollow noopener" target="_blank" title="ВКонтакте"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">ВКонтакте</span></a></li><li class="ya-share2__item ya-share2__item_service_facebook"><a class="ya-share2__link" href="https://www.facebook.com/" rel="nofollow noopener" target="_blank" title="Facebook"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Facebook</span></a></li><li class="ya-share2__item ya-share2__item_service_twitter"><a class="ya-share2__link" href="https://twitter.com/" rel="nofollow noopener" target="_blank" title="Twitter"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Twitter</span></a></li><li class="ya-share2__item ya-share2__item_service_viber"><a class="ya-share2__link" href="#" rel="nofollow" target="_blank" title="Instagram"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Viber</span></a></li><li class="ya-share2__item ya-share2__item_service_telegram"><a class="ya-share2__link" href="https://t.me/" rel="nofollow noopener" target="_blank" title="Telegram"><span class="ya-share2__badge"><span class="ya-share2__icon"></span></span><span class="ya-share2__title">Telegram</span></a></li></ul></div></div>
                    </div>
                </div>
                    
                    
                </div>
                <p>Copyright © 2010-2020. <span>Все права защищены</span></p>
            </div>
            <div class="bottom-widget">
                <div id="circleslider3" class="active">
                    <div class="offscreen-left"></div>
                    <div class="dot dot-1">
                        <div class="dot-name">ANDRITZ</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-2 active">
                        <div class="dot-name">О&nbsp;КОМПАНИИ</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-3">
                        <div class="dot-name">ФИЛЬТРАЦИЯ</div>
                        <span class="dot-icon"></span>
                    </div>
                    
                    <div class="dot dot-5">
                        <div class="dot-name">Сушка</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-6">
                        <div class="dot-name">Газоочистка</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-7">
                        <div class="dot-name">Производство</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-8">
                        <div class="dot-name">LENSER</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-9">
                        <div class="dot-name">CLEAR&nbsp;EDGE</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-10">
                        <div class="dot-name">СЕРВИС</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="dot dot-4">
                        <div class="dot-name">Флотация</div>
                        <span class="dot-icon"></span>
                    </div>
                    <div class="offscreen-right"></div>
                </div>
                <div id="client-map">
                    <div class="map-block">
                        <img src="img/map.svg" alt="" class="mapp">

                        <div class="map-point point-1 first">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/map-logo-2.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО "АрселорМиттал<br> Темиртау"
                                </div>
                                <div class="hiden_text">Рукавные фильтры ФРИР. Рукава, каркасы</div>
                            </div>
                        </div>

                        <div class="map-point point-7 first reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/kazchrome.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО<br> “ТНК Казхром”
                                </div>
                                <div class="hiden_text">Сушильные комплексы, газоочистка: каркасы, рукава</div>
                            </div>
                        </div>

                        <div class="map-point point-4 first reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/kazcink.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО<br> “Казцинк”
                                </div>
                                <div class="hiden_text">Фильтровальные плиты Lenser. Рамные фильтры РОМ</div>
                            </div>
                        </div>

                        <div class="map-point point-2 first reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/kazakhmys.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО “Корпорация <br> Казахмыс”
                                </div>
                                <div class="hiden_text">Фильтр-прессы</div>
                            </div>
                        </div>

                        <div class="map-point point-16 second">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/gg.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО “Алмалыкский ГМК”<br> Республика Узбекистан
                                </div>
                                <div class="hiden_text">Ремонт 3-х фильтр-прессов и поставка запчастей. Рамные фильтры
                                    РОМ 50, сушилки БН 1,2*8
                                </div>
                            </div>
                        </div>

                        <div class="map-point point-3 second reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/erg.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО<br> “Коммерческий<br> центр ERG”
                                </div>
                                <div class="hiden_text">Каркасы, рукава для системы газоочистки</div>
                            </div>
                        </div>

                        <div class="map-point point-12 second reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/ssgpo.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО “Актюбинская<br>медная компания”
                                </div>
                                <div class="hiden_text">Фильтровальные плиты, салфетки</div>
                            </div>
                        </div>

                        <div class="map-point point-6 second reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/py-6.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО “РУ-6”
                                </div>
                                <div class="hiden_text">Фильтр-прессы ФКМ 20. Сервис</div>
                            </div>
                        </div>

                        <div class="map-point point-18 thre">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/tgpk.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО "Текелийский<br>горноперерабатывающий<br> комплекс"
                                </div>
                                <div class="hiden_text">Ленточный вакуум-фильтр ЛОН 10. Запчасти к ДОО</div>
                            </div>
                        </div>

                        <div class="map-point point-11 thre">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/himkpmp.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО &ldquo;СП<br> &ldquo;ЮГХК&rdquo;
                                </div>
                                <div class="hiden_text">Запчасти, фильтровальные материалы для фильтр-пресса КМПм-12,5.
                                    Сервис
                                </div>
                            </div>
                        </div>

                        <div class="map-point point-8 thre">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/kazfosfat.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО "КАЗФОСФАТ"
                                </div>
                                <div class="hiden_text">Фильтр-пресс ФКМ 65, салфетки, сервис. ФРИР 110. Емкостные
                                    фильтры МГВ 20
                                </div>
                            </div>
                        </div>

                        <div class="map-point point-10 thre">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/aok.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО<br> “Алюминий<br> Казахстана”
                                </div>
                                <div class="hiden_text">Емкостные фильтры<br> МГВ 250, вакуум-фильтры ДОО 100</div>
                            </div>
                        </div>

                        <div class="map-point point-23 four reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/az.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО "Актюбинский завод<br>хромовых соединений"
                                </div>
                                <div class="hiden_text">Плиты, рамы фильтровальные, запчасти</div>
                            </div>
                        </div>

                        <div class="map-point point-24 four reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/kzalt2.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО “ГМК<br> Казахалтын”
                                </div>
                                <div class="hiden_text">Фильтр-пресс ФКМ 50, фильтровальные плиты, салфетки</div>
                            </div>
                        </div>

                        <div class="map-point point-13 four reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/appak.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО<br> “АППАК”
                                </div>
                                <div class="hiden_text">Фильтровальные плиты и салфетки для фильтр-пресса Filmac</div>
                            </div>
                        </div>

                        <div class="map-point point-20 four reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/karatau.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО<br> “Каратау”
                                </div>
                                <div class="hiden_text">Фильтр-прессы ФММ 20, плиты и салфетки. Сервис</div>
                            </div>
                        </div>

                        <div class="map-point point-22 five">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/ssgpoo.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО<br> “ССГПО”
                                </div>
                                <div class="hiden_text">Дисковые вакуум-фильтры ДОО 100, ДОО 160, запчасти</div>
                            </div>
                        </div>

                        <div class="map-point point-9 five reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/map-logo-1.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО "Алтай<br>Полиметаллы"
                                </div>
                                <div class="hiden_text">Сервисное обслуживание фильтр-прессов</div>
                            </div>
                        </div>

                        <div class="map-point point-21 five sec24 reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/map-logo-3.png" alt="">
                                </div>
                                <div class="map-title">
                                    Стекольный завод<br>“Алматы Стекло”
                                </div>
                                <div class="hiden_text">Сушильный комплекс Ф1.8*10. Теплогенератор</div>
                            </div>
                        </div>

                        <div class="map-point point-15 five sec25 reverse">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/polimetall2.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО “Бакырчикское<br> горнодобывающее<br> предприятие”
                                </div>
                                <div class="hiden_text">3 сушильных комплекса<br> БН 2,2*14 и запчасти</div>
                            </div>
                        </div>

                        <div class="map-point point-19 sec26 six">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/semizbay.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО<br> “Семизбай - U”
                                </div>
                                <div class="hiden_text">Сервис. Салфетки и запчасти к фильтр-прессу ФКМ 20</div>
                            </div>
                        </div>

                        <div class="map-point point-5 last">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/varvarinskoe.png" alt="">
                                </div>
                                <div class="map-title">
                                    АО<br> “Варваринское”
                                </div>
                                <div class="hiden_text">Комплект фильтровальных плит</div>
                            </div>
                        </div>

                        <div class="map-point point-30">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/baikenu.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО <br> &ldquo;Байкен-U&rdquo;
                                </div>
                                <div class="hiden_text">Фильтр-прессы ФММ 20, плиты и салфетки. Сервис</div>
                            </div>
                        </div>

                        <div class="map-point point-31">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО <br> “Актобе-Glass”
                                </div>
                                <div class="hiden_text">5 сушильных барабанов<br> БН 1,6-8НУ-03</div>
                            </div>
                        </div>
                        <div class="map-point point-32">
                            <div class="the-point">
                                <div class="map-point-images">
                                    <img class="map-point-icon" src="img/map-point.png">
                                    <span class="shape-map"></span>
                                    <img class="map-point-logo" src="img/Almix.png" alt="">
                                </div>
                                <div class="map-title">
                                    ТОО &ldquo;Almix&rdquo;
                                </div>
                                <div class="hiden_text">Сушильный барабан<br> БН 1,6-10НУ-03, запчасти</div>
                            </div>
                        </div>
                    </div>
                    <div class="client-map-btn">
                        <a href="#0" id="client-map-btn-text">География Клиентов</a>
                        <div class="close-btn">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="news-block">
                    <div class="hidden-block exectly-news">
                        <div class="slick-arrows">
                            <button class="next"><img src="img/next-arrow.svg" alt=""></button>
                            <button class="prev"><img src="img/prev-arrow.svg" alt=""></button>
                        </div>
                        <div class="news-slider">


                            @foreach(\App\News::where("status","1")->get()  as $new)
                                <a href="/blogs/{{$new->id}}" class="news-slide">
                                    <div class="date">
                                        <span class="number">{{\App\Helpers\Cicada::rus_date("d",strtotime($new->created_at))}}</span>
                                        <span class="mounth"
                                              style="text-transform: uppercase;text-align: center;">{{\App\Helpers\Cicada::rus_date("F",strtotime($new->created_at))}}</span>
                                        <span class="small-date">{{\App\Helpers\Cicada::rus_date("d.m.Y",strtotime($new->created_at))}}</span>
                                    </div>
                                    <div class="new-content">
                                        <h5>{{$new->name}}</h5>
                                        <p>{!! strip_tags($new->short_description) !!}</p>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                    <div class="top-news">
                        <div class="center-news">
                            <div class="news-title">
                                Новости
                            </div>
                            <div class="burger-news">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-block banner-block">
                    <div class="banner-slider" style="width: 37rem;">
                        @foreach($banners as $banner)
                        @if($banner->url == true)
                        <a href="{{ $banner->url }}">
                    <img src="{{asset('storage/'.$banner->image)}}" alt="">
                </a>
                @else
                <img src="{{asset('storage/'.$banner->image)}}" alt="">
                @endif
                        @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="soc-icons">
                            <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-services="vkontakte,facebook,twitter,instagram,telegram"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        let mapBlock = document.getElementsByClassName('map-block')[0];
        let pinching = false;
        let startPinchDistance = 0;
        let touchStartX = 0;
        let touching = false;

        document.body.addEventListener('touchstart', (evt) => {
            touching = true;
            if (evt.touches.length === 2) {
                pinching = true;
                startPinchDistance = getPinchDistance(evt.touches);
            } else if (evt.touches.length === 1) {
                touchStartX = evt.touches[0].pageX;
            }
        }, false)

        document.addEventListener('touchend', () => {
            pinching = false;
            touching = false;
        });

        document.body.addEventListener('touchmove', (evt) => {
            if (pinching) {
                pinchMove(evt);
            } else {
                if (touching && isClientMapOpen() && mapBlock.classList.contains('zoom-1') ||
                    mapBlock.classList.contains('zoom-2') ||
                    mapBlock.classList.contains('zoom-3')) {
                    let touchCurrentX = evt.touches[0].pageX;
                    let buffer = 10;
                    let leftSwipe = touchCurrentX < touchStartX && touchCurrentX < touchStartX + buffer;


                    let mapCompLeft = parseInt(window.getComputedStyle(mapBlock).getPropertyValue('left'));
                    if (leftSwipe) {
                        mapBlock.style.left = (mapCompLeft - 120) + 'px';
                    } else {
                        mapBlock.style.left = (mapCompLeft + 120) + 'px';
                    }
                }
            }
        }, false)

        let currentZoom = 0;

        function pinchMove(evt) {
            let currentPinchDistance = getPinchDistance(evt.touches);
            let scalingUp = currentPinchDistance > startPinchDistance;


            if (scalingUp) {
                switch (currentZoom) {
                    case 0:
                        clearZoom();
                        mapBlock.classList.add('zoom-1');
                        growLogos();
                        currentZoom++;
                        break;
                    case 1:
                        clearZoom();
                        mapBlock.classList.add('zoom-2');
                        growLogos();
                        currentZoom++;
                        break;
                    case 2:
                        clearZoom();
                        mapBlock.classList.add('zoom-3');
                        growLogos();
                        currentZoom++;
                        break;
                    default:
                        break;
                }
            } else {
                switch (currentZoom) {
                    case 1:
                        clearZoom();
                        mapBlock.classList.remove('zoom-1');
                        shrinkLogos();
                        currentZoom--;
                        break;
                    case 2:
                        clearZoom();
                        mapBlock.classList.add('zoom-1');
                        shrinkLogos();
                        currentZoom--;
                        break;
                    case 3:
                        clearZoom();
                        mapBlock.classList.add('zoom-2');
                        shrinkLogos();
                        currentZoom--;
                        break;
                    default:
                        break;
                }
            }
        }

        let logos = mapBlock.getElementsByClassName('map-point-logo');

        function growLogos() {
            for (let logo of logos) {
                let compWidth = parseInt(window.getComputedStyle(logo).getPropertyValue('width'));
                logo.style.width = (compWidth + 15) + 'px';
            }
        }

        function shrinkLogos() {
            for (let logo of logos) {
                let compWidth = parseInt(window.getComputedStyle(logo).getPropertyValue('width'));
                logo.style.width = (compWidth - 15) + 'px';
            }
        }

        function clearZoom() {
            mapBlock.classList.remove('zoom-1');
            mapBlock.classList.remove('zoom-2');
            mapBlock.classList.remove('zoom-3');
        }

        function getPinchDistance(touches) {
            return Math.hypot(
                touches[0].pageX - touches[1].pageX,
                touches[0].pageY - touches[1].pageY
            );
        }

        function isClientMapOpen() {
            return mapBlock.classList.contains('active');
        }
    </script>

@endsection
