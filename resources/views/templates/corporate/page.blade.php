@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/corporate-page.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span">@lang('Корпоративным и')</span><br>
                                    <span class="title-span">@lang('институциональным клиентам')</span>
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
                <h2>@lang('Корпоративным и институциональным клиентам')</h2>
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
    @switch(App::getLocale())
        @case('ru')
            @include('templates.corporate.operations')
            @include('templates.corporate.operations-2')
            @include('templates.corporate.merge')
            @include('templates.corporate.manage')
            @include('templates.corporate.reposit')
            @include('templates.corporate.consalting')
{{--            @include('templates.corporate.text')--}}

        @break

        @case('en')
            @include('templates.corporate.en.operations-en')
            @include('templates.corporate.en.operations-2-en')
            @include('templates.corporate.en.merge-en')
            @include('templates.corporate.en.manage-en')
            @include('templates.corporate.en.reposit-en')
            @include('templates.corporate.en.consulting-en')
{{--            @include('templates.corporate.en.text-en')--}}


        @break

        @case('uz')
            @include('templates.corporate.uz.operations-uz')
            @include('templates.corporate.uz.operations-2-uz')
            @include('templates.corporate.uz.merge-uz')
            @include('templates.corporate.uz.manage-uz')
            @include('templates.corporate.uz.reposit-uz')
            @include('templates.corporate.uz.consulting-uz')
{{--            @include('templates.corporate.uz.text-uz')--}}

        @break
    @endswitch
@endsection
