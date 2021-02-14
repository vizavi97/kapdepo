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
                                             @if($item->category_id == 1)@lang('Полезные статьи') @else @lang('Новости фондового рынка Узбекистана') @endif
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
                @php
                    if($item->category_id == 1){
                        $category = 'World';
                    }else{
                        $category = 'Uzbekistan';
                    }
                @endphp
                <h2>{{$item->title}}</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>
                        <a href="{{ route('news.page',$category) }}">@if($item->category_id == 1)@lang('Полезные статьи') @else @lang('Новости фондового рынка Узбекистана') @endif</a>
                    </li>
                    {{--<li>{{$item->title}}</li>--}}
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="block-news-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="sub-title">{{ $item->desc }}</h3>
                </div>
                <div class="col-md-5">
                    <div class="block-image">
                        <img src="/storage/{{ $item->image }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="block-description">
                         {!! $item->body !!}
                    </div>
                </div>
{{--                <h3>{{ date('d-m-Y', strtotime($item->created_at)) }}</h3>--}}

            </div>
        </div>
    </section>

    <style type="text/css">
        .block-news-item {
            margin-bottom: 5%;
        }
        .sub-title{
            margin-bottom: 15px;
        }
        .block-image img{
            width: 100%;
            object-fit: contain;
        }
    </style>
@endsection
