@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/partners.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span">@lang('Наши прайм партнёры')</span>
                                    <span class="bor"></span>

                                </div>
                                <h1> <br> </h1>
                                <div class="new-block-text">
                                    <p>    <br> </p>
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
                <h2>@lang('Наши прайм партнёры')</h2>
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
    <section class="partners">
        <div class="container">
            @foreach($partners as $item)
                <div class="present-block">
                    <div class="logo-partners">
                        <a href="{{ $item->link ? $item->link : '#' }}" target="_blank"><img src="storage/{{ $item->image }}"></a>
                    </div>
                    <div class="right-txt">
                        <h3>@lang('Оказываемые услуги')</h3>


                        <div class="check">
                            <p>{!! $item->desc !!}</p>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{--@foreach($partners as $item)--}}
        {{--<h1>{{ $item->title }}</h1>--}}
    {{--@endforeach--}}
@endsection
