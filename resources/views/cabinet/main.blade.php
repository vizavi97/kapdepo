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

            <div class="col-lg-9">
                <div class="user-detail">
                    <ul class="new-row-table">
                        <li>@lang('Имя Фамилия')</li>
                        <li>@lang('Номер договора')</li>
                        <li>@lang('КЗЛ')</li>
                        <li>E-mail</li>
                    </ul>
                    <ul class="row-table">
                        <li>{{ Auth::user()->first_name . ' ' . Auth::user()->surname  }}</li>
                        <li>{{ Auth::user()->agreement }}</li>
                        <li>{{ Auth::user()->name }}</li>
                        <li>{{ Auth::user()->email }}</li>
                    </ul>
                </div>
            </div>

@endsection
