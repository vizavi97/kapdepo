@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/about.jpg') }}) no-repeat; background-size: cover; background-position: bottom;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span"> @lang('О нас')</span>
                                    <span class="bor"></span>

                                </div>
                                <h3 style="font-weight: bold; color:white">  <br>
                                    @lang('Ключ в мир ценных бумаг')</h3>
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
                <h2>@lang('О нас')</h2>
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
    {{--team block--}}
    @include('templates.about-us.history')
    @include('templates.about-us.mission')
    @include('templates.about-us.team')
    @include('templates.statistics.block')
    @include('templates.about-us.certificates')
    @include('templates.about-us.achiev')

{{--    @include('templates.about-us.form')--}}
    {{--@include('templates.about-us.form')--}}
    {{--@include('templates.partners.block')--}}
    {{--@include('templates.contacts.block')--}}
{{--    @include('templates.locations.block')--}}
@endsection
