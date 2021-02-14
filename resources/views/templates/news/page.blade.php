@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/news-page.jpg') }}) no-repeat; background-size: cover; background-position: top;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                        <span class="title-span">
                                             @if($cat == 'World')@lang('Полезные статьи') @else @lang('Новости фондового рынка Узбекистана') @endif
                                        </span>
                                    <span class="bor"></span>

                                </div>
                                <h1>        <br>                        </h1>
                                <div class="new-block-text">
                                    <p>  <br> </p>
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
                <h2>@if($cat == 'World')@lang('Полезные статьи') @else @lang('Новости фондового рынка Узбекистана') @endif</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
{{--                    <li>@lang('новости')@if($item->category_id == 1)@lang('Мировые') @else @lang('Узбекистана')@endif</li>--}}
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')

    <section class="anch" id="news">
        <div class="container">
            <div class="row">

                @foreach($news as $item)
                    @php
                        if($item->category_id == 1){
                            $category = 'World';
                        }else{
                            $category = 'Uzbekistan';
                        }
                    @endphp
                    <div class="col-lg-4" style="margin-bottom: 15px;">
                        <div class="inner">
                            <img src="/storage/{{ $item->image }}">
                            <div class="info"><div class="name">{{ $item->title }}</div><p>{{ $item->desc }}</p><div class="bottom-block"><span class="cake-date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span></div></div>
                            <a href="{{ route('news.item', ['category' => $category , 'slug'=>$item->slug]) }}" class="open-popup" tabindex="0"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pag">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        main #news .bottom-block {
            position: static;
        }
        main #news .inner .info {
            position: absolute;
            bottom: 30px;
            left: 0;
            top: auto;
            padding: 8px 25px;
            background: rgb(0,51,135);
            background: linear-gradient(90deg, rgba(0,51,135,1) 0%, rgba(0,51,135,0) 100%);
        }
        main .inner .info p {
            margin-bottom: 5px;
            width: 100%;
            text-transform: inherit;
            font-size: 14px;
            font-weight: normal;
        }
        main #news .bottom-block span {
            font-size: 12px;
        }
        main .inner .info .name {
            margin-bottom: 5px;
            padding-bottom: 5px;
            line-height: 17px;
            border-bottom: 1px solid #fff;
            width: 100%;
        }
    </style>
@endsection
