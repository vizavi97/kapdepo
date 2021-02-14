@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/offer.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span"> @lang('Наши предложения')</span>
                                    <span class="bor"></span>

                                </div>
                                <h3 style="font-weight: bold; color:white">  <br>
                                    @lang('Мы понимаем нужды наших клиентов, потому что мы сами являемся инвесторами')</h3>
                                <div class="new-block-text">
                                    <p>
                                        <br>  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('breadcrumb')
    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Наши предложения')</h2>
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

    <section style="margin-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="offer-block">
                        <div class="border-after top"></div>
                        <div class="border-after left"></div>
                        <div class="border-after right"></div>
                        <div class="border-after bootom"></div>

                        <div class="offer-info">

                            <p>
                                <a href="{{ route('private.page') }}">@lang('Частным клиентам')</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-block">
                        <div class="border-after top"></div>
                        <div class="border-after left"></div>
                        <div class="border-after right"></div>
                        <div class="border-after bootom"></div>

                        <div class="offer-info">
                            <p>
                                <a href="{{ route('corporate.page') }}">
                                    @lang('Корпоративным и институциональным клиентам')
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('templates.private.tariff')
    <style type="text/css">
        .offer-block .border-after::after {
            border: 1px solid #fff;
            z-index: 0;
        }
        .offer-block .border-after.top::after {
            top: 15px;
            left: 0px;
            position: absolute;
            content: '';
            display: block;
            height: 75px;
        }
        .offer-block .border-after.left::after {
            position: absolute;
            content: '';
            display: block;
            height: 1px;
            left: 0px;
            right: 0;
            top: 15px;
            width: 75px;
        }
        .offer-block .border-after.right::after {
            position: absolute;
            content: '';
            display: block;
            /* height: 0px; */
            right: 0px;
            bottom: 15px;
            width: 75px;
        }
        .offer-block .border-after.bootom::after {
            position: absolute;
            content: '';
            display: block;
            height: 75px;
            right: 0px;
            bottom: 15px;
        }
        .offer-block{
            height: 200px;
            position: relative;
            display: flex;
            background: rgb(13,45,186);
            background: radial-gradient(circle, rgba(13,45,186,1) 0%, rgba(9,31,133,1) 85%);
        }
        .offer-block .offer-info{
            width: 80%;
            margin: auto;
            z-index: 9;
        }
        .offer-block p{

            margin: 0;
            text-align: center;
            font-size: 28px;
            padding: 0 15px;
            font-weight: bold;
             color: white;
            text-transform: uppercase;
        }
        .offer-block p a{
            color: white;
        }
    </style>
@endsection
