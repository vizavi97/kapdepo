@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/4.jpg') }}) no-repeat; background-size: cover; background-position: 0 32%;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span">@lang('Рыночные данные')</span>
                                    <span class="bor"></span>

                                </div>
                                <h1> <br>  </h1>
                                <div class="new-block-text">
                                    <p>   <br>  </p>
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
                <h2> {{ $comp->title }}</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li><a href="{{ route('market.page') }}">@lang('Рыночные данные')</a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="market-nav">
{{--                        {{  $name = Route::currentRouteName() }}--}}
                        {{--{{  Route::current() }}--}}
                        <ul>
                            <li><a class="{{ Route::currentRouteName() == 'market.company' ? 'active' : '' }}"  href="{{ route('market.company', ['issuer' => $issuer]) }}"><span>@lang('Общее')</span></a></li>
                            <li><a class="{{ Route::currentRouteName() == 'market.profile' ? 'active' : '' }}"  href="{{ route('market.profile', ['issuer' => $issuer]) }}"><span>@lang('Инфо')</span></a></li>

                            <li><a class="{{ Route::currentRouteName() == 'market.balance' ? 'active' : '' }}"  href="{{ route('market.balance', ['issuer' => $issuer]) }}"><span>@lang('Баланс')</span></a></li>
                            <li><a class="{{ Route::currentRouteName() == 'market.financial' ? 'active' : '' }}"  href="{{ route('market.financial', ['issuer' => $issuer]) }}"><span>@lang('Финансовый отчёт')</span></a></li>
                            @if(isset(Auth::user()->id))
                                <li><a class="{{ Route::currentRouteName() == 'market.analysis' ? 'active' : '' }}"  href="{{ route('market.analysis', ['issuer' => $issuer]) }}"><span>@lang('Аналитика')</span></a></li>
                            @else
                                <li><a data-toggle="modal" data-target="#request-call1" href="#"><span><i class="fa fa-lock" aria-hidden="true"></i></span> <span>@lang('Аналитика')</span></a></li>
                            @endif



                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        @switch(Route::currentRouteName())
            @case('market.company')
                @include('market-data.block-summary')
            @break
            @case('market.balance')
                @include('market-data.block-balance')
            @break
            @case('market.financial')
                @include('market-data.block-financial')
            @break
            @case('market.analysis')
                @include('market-data.block-analysis')
            @break
            @case('market.profile')
                @include('market-data.block-profile')
            @break
        @endswitch
    </section>

    <style>
        .market-nav{
            padding: 0 20px;
        }
        .market-nav ul{
            /*border-bottom: 3px solid #e0e4e9;*/
            background: #0056b3;
            padding: 10px 0;
            text-align: left;
        }
        .market-nav ul li{
            display: inline-block;
        }
        /*.market-nav ul li a:hover{*/
            /*border-bottom: 3px solid #188fff;*/
        /*}*/
        .market-nav ul li a {
            padding: 12px 12px;
            font-weight: bold;
            color: white;
        }
        .market-nav .active{
            /*border-bottom: 3px solid #188fff;*/
            background: white;
            color: #0056b3;

        }
        .market-nav ul li a:hover{
            background-color: white;
            color: #0056b3;
        }
    </style>
@endsection
