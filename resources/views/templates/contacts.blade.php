@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/3-1.jpg') }}) no-repeat; background-size: 100% 100%; background-position: top;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span">@lang('Контакты')</span>
                                    <span class="bor"></span>
                                </div>
                                <h1> <br>  </h1>
                                <div class="new-block-text">
                                    <p>  <br> </p>
{{--                                    <a href="#">подробнее</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">

    </style>
@endsection
@section('back-ground')
    <div class="test-block">

    </div>
@endsection
@section('breadcrumb')

    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Контакты')</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="section-location" style="padding-top: 0">
        <div class="container">
            <div class="row">
{{--                <div class="col-md-5">--}}
{{--                    <h4 class="revizit-title">@lang('Наши реквизиты')</h4>--}}
{{--                    <ul class="revizit">--}}
{{--                        <li><span>Р/с : </span>2020 8000 6044 1372 9004</li>--}}
{{--                        <li><span>ОАИКБ : </span>Главное операционное отделение НБ ВЭД РУз.</li>--}}
{{--                        <li><span>МФО : </span>00407</li>--}}
{{--                        <li><span>ИНН : </span>205 707 218</li>--}}
{{--                        <li><span>ОКЭД :</span>66120</li>--}}
{{--                        <li><span>Тел./факс :</span>(0 371) 286-20-31, 286-20-32, (78) 113-11-00 </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="col-md-12">
                    <div class="map">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="column-location">
                        <img src="{{ asset('front/img/info-icon.png') }}">
                        <div class="column-location-text">
                            <span>Email</span>
                            <p><a href="#">{{ $settings->email }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="column-location">
                        <img src="{{ asset('front/img/phone-icon.png') }}">
                        <div class="column-location-text">
                            <span>@lang('Телефон')</span>
                            <p>{{ $settings->phone }};
                                <br>(0 371) 286-20-32 ; </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="column-location">
                        <img src="{{ asset('front/img/location-icon.png') }}">
                        <div class="column-location-text">
                            <span style="padding: 0;">@lang('Адрес')</span>
                            <p>
                                @switch(app()->getLocale())
                                    @case('ru')
                                    {{ $settings->address_ru }}
                                    @break
                                    @case('uz')
                                    {{ $settings->address_uz }}
                                    @break
                                    @case('en')
                                    {{ $settings->address_en }}
                                    @break
                                @endswitch
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="section-contact-us" style="margin-bottom: 90px; background: url({{ asset('front/cont.jpg') }}) no-repeat center; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-us-text">
                        <h4>@lang('СВЯЖИТЕСЬ С НАМИ') <span>@lang('Получите бесплатную консультацию')</span></h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-us-form">

                        <script id="bx24_form_inline" data-skip-moving="true">
                            (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
                                (w[b].forms=w[b].forms||[]).push(arguments[0])};
                                if(w[b]['forms']) return;
                                var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
                                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                            })(window,document,'https://kapdepo.bx24.uz/bitrix/js/crm/form_loader.js','b24form');

                            b24form({"id":"8","lang":"ru","sec":"ow3y6r","type":"inline"});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        main .section-location .column-location{
            height: 150px;
        }
        .main-wrap{
            position: relative;
        }
        .test-block{
            background: url(http://kapdep.loc/front/director-back.png) no-repeat bottom;
            background-size: cover;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 100px;
        }
        .revizit{
            padding: 0;
            margin: 0;
        }
        .revizit li{
            list-style: none;
            text-transform: uppercase;
            padding: 5px 0;
        }
        .revizit li span{
            font-weight: bold;
        }
        .revizit-title{
            font-weight: bold;
            /*text-transform: uppercase;*/
            margin-bottom: 15px;
        }
        #map{
            width:100%;
            height:370px;
        }

        .data-loc {
            font-family: "Century Gothic";
        }
        .data-loc p{
            padding-left: 10px;
            /*margin: 0;*/
            margin: 10px 0;

        }
        .data-loc h5{
            color: #0b4e96;
            font-weight: bold;
            padding-left: 10px;
        }
        .data-loc a {
            text-transform: uppercase;
            font-weight: bold;
            padding: 3px 10px;
            background: white;
            margin-left: 10px;
            color: #0b4e96;
            border: 1px solid #0b4e96;
            border-radius: 15px;

        }
        .data-loc a:hover{
            color: white;
            background: #0b4e96;
        }
    </style>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=297d2a23-9054-4b42-b162-0143f07df0d4&lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript">
        // Initialize and add the map


        $(document).ready(function () {
            // ymaps.ready(init);

            function init(){

                var map = new ymaps.Map('map', {

                    center: [41.32,69.30],
                    zoom: 11,
                    controls: []
                },{
                    searchControlProvider: 'yandex#search'
                });

                var objectManager = new ymaps.ObjectManager();

                objectManager.add(branches);
                map.geoObjects.add(objectManager);
                {{--var myPlacemark = new ymaps.Placemark([41.31,69.24], {}, {--}}
                {{--iconLayout: 'default#image',--}}
                {{--iconImageHref: '{{asset('marker.png')}}',--}}
                {{--iconImageSize: [40, 57],--}}
                {{--iconImageOffset: [-21, -59],--}}
                {{--balloonContent:'test',--}}
                {{--iconContent: '12'--}}
                {{--});--}}

                // map.geoObjects.add(myPlacemark);

            }
            var CSRF_TOKEN =  $('meta[name=csrf-token]').attr('content');
            var branches;

            function getBranches() {
                $.ajax({
                    type: 'POST',
                    url: '/branches',
                    dataType: 'JSON',
                    data: {_token: CSRF_TOKEN},
                    success: function (data) {
                        branches = data;
                        console.log(branches);
                    }
                }).done(function () {
                    ymaps.ready(init);
                });
            }

            getBranches();
        });

    </script>

@endsection
