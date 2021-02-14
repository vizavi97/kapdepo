@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/bonds-newest.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span">  @lang('Облигации') </span>
                                    <span class="bor"></span>

                                </div>
                                <h1>  <br> </h1>
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
                <h2>@lang('Облигации')</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>
                        <a href="{{ route('private.page') }}">@lang('Частным клиентам')</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table-bonds">
                        <thead>
                            <tr>
                                <th colspan="2">@lang('Название')</th>
                                <th>@lang('Ставка')</th>
                                <th>@lang('Дата / Cрок погошения')</th>
                                <th>@lang('Цена')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bonds as $item)
                                <tr>
                                    <td><img src="/storage/{{ $item->image }}" alt=""></td>
                                    <td><span>{{ $item->title }}</span> <br>{{ $item->issuer }}</td>
                                    <td>{{ $item->percent }} %</td>
                                    <td><span>{{ $item->date_in }}</span> <br> {{ $item->date_out . ' ' . __('мес.')}}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $bonds->links() }}
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        .table-bonds{
            width: 100%;
            margin-bottom: 5%;
        }
        .table-bonds thead tr th{
            padding: 10px 0px 10px 10px;
            border-bottom: 1px solid #efefef;
            font-size: 14px;
        }
        .table-bonds thead tr th:first-child{
            text-align: left;
            padding-left: 0;
        }
        .table-bonds tr td, .table-bonds thead tr th{
            text-align: right;
        }
        .table-bonds tr td:first-child{
            text-align: left;
            width: 1%;
        }
        .table-bonds tbody tr:hover {
            background: #efefef;
        }
        .table-bonds tbody tr td:nth-child(2){
            text-align: left;
        }
        .table-bonds tbody tr td{
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
        }
        .table-bonds tbody tr td span{
            font-weight: bold;
        }
        .table-bonds tbody tr td img {
            width: 45px;
            height: 45px;
            object-fit: contain;
            border-radius: 50px;
        }

    </style>
@endsection
