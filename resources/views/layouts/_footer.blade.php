</div>


<style>
    .social-fc-links .ya-share2__badge {
        background-color: transparent;
    }
    .soc-icons {
        margin-bottom: 0;
    }
    .ya-share2__item.ya-share2__item_service_telegram {
        order: 5;
    }

    .ya-share2__item.ya-share2__item_service_vkontakte {
        order: 4;
    }

    .ya-share2__item.ya-share2__item_service_viber {
        order: 3;
    }

    .ya-share2__item.ya-share2__item_service_twitter {
        order: 2;
    }

    .ya-share2__item.ya-share2__item_service_facebook {
        order: 1;
    }

    .ya-share2__container_size_m .ya-share2__item_service_viber .ya-share2__icon {
        background-size: 16px;
        background-image: url(img/inst.svg);
        background-repeat: no-repeat;
    }

    .ya-share2.ya-share2_inited {
        width: 100%;
    }

    .ya-share2__list.ya-share2__list_direction_horizontal {
        margin-top: -2px;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .ya-share2__container_size_m .ya-share2__icon {
        height: 15px;
        width: 15px;
        background-size: 23px;
        background-position: center center;
    }
</style>


<script src="{{ asset('js/kursor.js') }}"></script>
<script>
    new kursor({
        type: 4,
        color: '#fff'
    })
    new Kursor({
  el: '.slick-prev'
})
</script>


<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
<script src="{{ asset('js/app-service.min.js') }}"></script>
<script src="{{ asset('js/app.min.js')}}"></script>
<script src="/bootstrap-select/js/app.js"></script>
<script src="{{ asset('js/slick-1.8.1/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/circle-type.min.js') }}"></script>
<script src="{{ asset('libs/modernizr/modernizr.js') }}"></script>
<script src="{{ asset('libs/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/readmore-symbols.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
