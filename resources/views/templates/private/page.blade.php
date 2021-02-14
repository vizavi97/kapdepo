@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/private-page.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span">@lang('Частным клиентам')</span>
                                    <span class="bor"></span>
                                </div>
                                <h1>
                                    <br>
                                </h1>
                                <div class="new-block-text">
                                    <p>
                                        <br>
                                    </p>
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
                <h2>@lang('Частным клиентам')</h2>
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
    @include('templates.private.trade')
    @switch(App::getLocale())
        @case('ru')
            @include('templates.private.portfel')
        @include('templates.private.deposit')
        @include('templates.private.deal')
        @include('templates.private.manage')
        @include('templates.private.text')

        @break
        @case('en')
            @include('templates.private.en.portfel-en')
        @include('templates.private.en.deposit-en')
        @include('templates.private.en.deal-en')
        @include('templates.private.en.manage-en')
        @include('templates.private.en.text-en')


        @break
        @case('uz')
            @include('templates.private.uz.portfel-uz')
        @include('templates.private.uz.deposit-uz')
        @include('templates.private.uz.deal-uz')
        @include('templates.private.uz.manage-uz')
        @include('templates.private.uz.text-uz')

        @break
    @endswitch

{{--    @include('templates.private.tariff')--}}

@endsection
