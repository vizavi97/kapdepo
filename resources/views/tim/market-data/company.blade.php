@extends('layouts.app')
@push('scripts')
  <script type="text/javascript">
    localStorage.setItem('csrf', document.getElementsByName('csrf-token')[0].content)
  </script>
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endpush
@push('styles')
  <link rel="stylesheet" href="{{asset('./css/tim/steps.css')}}"/>
  <link rel="stylesheet" href="{{asset('./css/tim/market-data.css')}}"/>
@endpush
@section('main_head')
  <section class="banner-section">
    <div class="banner-page-new">
      <div class="item">
        <div class="bg_header"
             style="background: url({{ asset('front/4.jpg') }}) no-repeat; background-size: cover; background-position: 0 32%;"></div>
        <div class="item-banner">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="slider-wrapper__section">
                  <span class="title-span">@lang('Рыночные данные')</span>
                  <span class="bor"></span>

                </div>
                <h1><br></h1>
                <div class="new-block-text">
                  <p><br></p>
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
        <h2 id="company-title"> {{ $company->title }}</h2>
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
      <div class="company-container my-4" id="company-data"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            @if(count($company->bonds) > 0)
              <h3>@lang('Облигации')</h3>
              <table class="table-bonds">
                <thead>
                <tr>
                  <th colspan="2">@lang('Название')</th>
                  <th>@lang('Доходность')</th>
                  <th>@lang('Дата размещения')</th>
                  <th>@lang('Дата погошения')</th>
                  <th>@lang('Срок обращения')</th>
                  <th>@lang('Номинал')</th>
                  <th>@lang('Цена')</th>
                  <th>@lang('Кол-во ЦБ')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company->bonds as $item)
                  <tr>
                    <td><img src="/storage/{{ $item->image }}" alt=""></td>
                    <td><span>{{ $item->title }}</span> <br>{{ $item->issuer }}</td>
                    <td>{{ $item->percent }}</td>
                    <td>{{ $item->date_posting }}</td>
                    <td>{{ $item->date_maturity }}</td>
                    <td>{{ $item->term_circulation }}</td>
                    <td>{{ $item->denomination }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->cb_count }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            @else
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
