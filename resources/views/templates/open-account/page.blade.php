@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/open.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span"> @lang('Открыть счёт') </span>
                                    <span class="bor"></span>

                                </div>
                                <h1><br>   </h1>
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
@section('breadcrumb')
    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Открыть счёт')</h2>
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

    <section id="open-account-block" class="open-account">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="open-title">@lang('Заполните форму для открытия счёта')</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('open.account.type', 'physical') }}#form-block" id="physical" class="btn btn-primary @if($type == 'physical'){{  'active-but' }} @endif open-but">@lang('Для физических лиц')</a>
                </div>
                <div class="col-6">
                    <a href="{{ route('open.account.type', 'law') }}#form-block" id="law" class="btn btn-primary @if($type == 'law'){{  'active-but' }} @endif open-but">@lang('Для юридических лиц')</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div  id="form-block" class="physical">
                        @switch($type)
                            @case('physical')
                                @include('templates.open-account.physical')
                            @break
                            @case('law')
                                @include('templates.open-account.law')
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        .open-account{
            padding: 100px;
        }

        .open-account .open-title{
            text-align: center;
        }
        #physical{
            float: right;
        }
        #law{
            float: left;
        }
        #physical, #law{
            width: auto;
        }
        .open-account .open-but:hover{
            color: #0151D3;
            background-color: white;
        }
        .open-account .active-but{
            color: #0151D3;
            background-color: white;
        }
    </style>



@endsection
