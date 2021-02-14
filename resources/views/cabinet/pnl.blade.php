@extends('cabinet.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/pnl-new.jpg') }}) no-repeat; background-size: 101%; background-position: center;opacity: 0.8;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">

                                    <span class="title-span">@lang('Profit & Loss')</span>
                                    <span class="bor"></span>

                                </div>
                                <h1></h1>
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
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <div class="data-pnl">
                    <h3>
                        @lang('Состояние инвестиционного портфеля на')			{{ date('d-m-Y') }}
                        <a href="{{ route('cabinet.home') }}" class="back-to-cabinet">@lang('перейти в кабинет')</a>
                    </h3>
                    <table class="pnl-table">
                        <thead>
                        <tr>
                            <th colspan="2">@lang('Компания') </th>
                            <th>@lang('Тип ЦБ')</th>
                            <th>@lang('Кол-во ЦБ')</th>
                            <th>@lang('Cумма инвестиций')</th>
                            <th>@lang('Тек. цена')</th>
                            <th>P/L (@lang('сум'))</th>
                            <th>P/L(%)</th>
                            <th>@lang('Цена окупаемости инвестиции')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                @if(!empty($item['image']))
                                    <td><img src="/storage/{{ $item['image'] }}" alt=""></td>
                                @else
                                    <td><img src="{{asset('front/img/favicon.png')}}" alt=""></td>
                                @endif
                                <td>{{ $item['name'] }}</td>
                                <td>@lang('Акции')</td>
                                <td>{{ $item['current_count_items'] }}</td>
                                <td>{{ $item['sum_buy'] }}</td>
                                <td>{{ $item['current_price'] }}</td>
                                <td @if($item['pl_$'] > 0) style="color: #39b839;" @else  style="color: red;" @endif>{{ number_format($item['pl_$'] , '2', '.','') }}</td>
                                <td @if($item['pl_%'] > 0) style="color: #39b839;" @else  style="color: red;" @endif>{{ $item['pl_%'] . ' %' }}</td>
                                <td>{{ $item['payback_price'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <table class="pnl-table-main">
                        <thead>
                        <tr>
                            <th class="first-row">@lang('Инвестиции')</th>
                            <th class="second-row">P/L</th>
                            <th class="third-row">@lang('Всего капитал')</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $gen_sum_invest }}</td>
                            <td @if($gen_sum_pl > 0) style="color: #39b839;" @else  style="color: red;" @endif>{{ number_format($gen_sum_pl, '2', '.' , '')  }}</td>
                            <td @if($gen_sum_total > 0) style="color: #39b839;" @else  style="color: red;" @endif>
                                {{ number_format($gen_sum_total, '2', '.', '')  }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .data-pnl{
            margin-bottom: 25px;
        }
        .data-pnl h3{
            text-align: left;margin-bottom: 20px;
            font-weight: bold;
            color: #0c439b;
        }
        .pnl-table, .pnl-table-main{
            width: 100%;
        }
        .pnl-table thead th{
            font-size: 15px;
            background: #0c439b;
            color: white;
            padding: 10px 5px;
        }
        .pnl-table thead th:not(:first-child){
            text-align: right;
        }
        .pnl-table tbody tr td:not(:first-child){
            text-align: right;

        }
        .pnl-table tbody tr td:nth-child(2){
            text-align: left !important;
            padding-left: 0;
        }
        .pnl-table tbody tr td:nth-child(1){
            padding-right: 0;
        }
        .pnl-table tbody tr td img:first-child{
            height: 45px;
            width: 45px;
            object-fit: contain;
        }
        .pnl-table tbody td{
            /*border: 1px solid #cacaca;*/
            border-top: 1px solid #cacaca;
            color: black;
            font-size: 13px;
            font-weight: bold;
            padding: 10px 5px;
            text-align: left;
        }
        .pnl-table tbody tr:nth-child(even){
            background: #efefef;
        }
        .back-to-cabinet{
            float: right;
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: #0151D3;
            border-radius: 35px;
            border: 2px solid #0151D3;
        }
        .back-to-cabinet:hover{
            color: #0151D3;
            background-color: white;
        }
        .pnl-table-main{
            margin-top: 20px;
        }

        .pnl-table-main thead tr, .pnl-table-main tbody tr{
            text-align: center;
        }
        .pnl-table-main thead th{
            /*border: solid 1px;*/
            position: relative;
        }
        .pnl-table-main .first-row:after{
            content: ' \002B';
            position: absolute;
            right: -5px;
        }
        .pnl-table-main .second-row:after{
            content: ' \003D';
            position: absolute;
            right: -5px;
        }
        .pnl-table-main tbody td{
            font-weight: bold;
        }
        .pnl-table-main{
            /*border-top: solid 3px #0151D3;*/
        }
    </style>
@endsection
