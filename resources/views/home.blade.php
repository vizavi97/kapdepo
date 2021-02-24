@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner">
            @foreach($banners as $banner)
                @php
                    if($banner->category_id == 1){
                        $category = 'World';
                    }else{
                        $category = 'Uzbekistan';
                    }
                @endphp
                <div class="item">
                    <div class="bg_header" style="background: url('/storage/{{ $banner->image }}'); background-repeat: no-repeat;background-position: center;  background-size: cover;"></div>
{{--                    <div class="bg_header" style="background: url('{{ asset('ban.jpeg') }}');"></div>--}}
                    <div class="item-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h1>{{ $banner->title }}</h1>
                                    <a href="{{ route('news.item', ['category'=>$category,'slug' => $banner->slug]) }}">@lang('подробнее')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <section class="customers" style="display: none">
        <div class="container">
            <div class="row home-block-three">
                <div class="col-lg-4 block-item-three col-md-6">
                    <div class="column">
                        <a href="{{ route('private.page') }}">
                            <div>
                                <div class="column-img" id="private-clients"></div>
                                <span>@lang('Частным клиентам')</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 block-item-three col-md-6">
                    <div class="column">
                        <a href="{{ route('corporate.page') }}">
                            <div>
                                <div class="column-img" id="corporative-clients"></div>
                                <span>@lang('Корпоративным клиентам') </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 block-item-three offset-lg-0 col-md-6 offset-md-3">
                    <div class="column">
                        <a href="{{ route('kd.page') }}">
                            <div>
                                <div class="column-img" id="kd-ideas"></div>
                                <span>KD Ideas</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .home-block-three{
            justify-content: center;
        }
        .home-block-three .block-item-three{
            max-width: 28.333%;
        }
    </style>
@endsection
@section('content')

   @switch(App::getLocale())
       @case('ru')
            @include('templates.director.block')
       @break
       @case('uz')
            @include('templates.director.block-uz')
       @break
       @case('en')
           @include('templates.director.block-en')
       @break
   @endswitch
   @include('templates.choose-us.block')
   @include('templates.statistics.block')
   @include('templates.news.block')
   @include('templates.partners.block')
   @include('templates.contacts.block')
   @include('templates.locations.block')
@endsection
