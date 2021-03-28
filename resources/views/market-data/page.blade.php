@extends('layouts.app')
@push('scripts')
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endpush
@push('styles')
  <link rel="stylesheet" href="{{asset('./css/tim/steps.css')}}"/>
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
@section('back-ground')
  <div class="test-block">

  </div>
@endsection
@section('breadcrumb')
  <section class="about-us">
    <div class="container">
      <div class="site-title clearfix">
        <h2>@lang('Рыночные данные')</h2>
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
  <div class="container-fluid">
    <div id="market-data"></div>
    <div class="market-list">

    </div>
  </div>
  <style>
    .main-wrap {
      position: relative;
    }

    .market-list {
      margin-bottom: 50px;
    }

    .market-table {
      width: 100%;
    }

    .market-table thead tr {
      background: #0056b3;
    }

    .market-table thead tr th {
      color: white;
      font-size: 11px;
      font-weight: bold;
      text-align: right;
      padding: 7px 5px 7px 10px;
    }

    .market-table tbody tr {
      border-top: 1px solid #e2e5ea;
    }

    .market-table tbody tr:hover, .market-table tbody tr:nth-child(even):hover {
      background-color: #e0f0ff;
    }

    .market-table tbody tr:nth-child(even) {
      background-color: #f5f5f7;
    }

    .market-table tbody tr td {
      font-size: 13px;
      font-weight: bold;
      text-align: right;
      padding: 5px 5px 5px 10px;
    }

    .market-table tbody tr td:first-child {
      text-transform: uppercase;
      color: #0151D3;
    }

    .market-table tbody tr td a {
      color: #0056b3;
    }

    .market-table tbody tr td a:hover {
      text-decoration: underline;
    }

    .market-table thead th:first-child, .market-table thead th:nth-child(2), .market-table tbody td:first-child, .market-table tbody td:nth-child(2) {
      text-align: left;
      padding-left: 5px;
    }

    .market-table thead th:first-child {
      padding-left: 5px;
    }
  </style>
@endsection
