@extends('layouts.app')
@section('breadcrumb')
    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Вступить в нашу команду')</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>
                        <a href="{{ route('about.page') }}">@lang('О нас')</a>
                    </li>
                    <li>@lang('Вступить в нашу команду')</li>
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
                    <h5>@lang('Скачайте анкенту, заполните необходимые данные и отправьте на e-mail') <span>{{ $settings->email }}</span> </h5>
                    <h5><a download href="/{{ $settings->file }}">Анкета</a></h5>
                </div>
            </div>
        </div>
    </section>
@endsection