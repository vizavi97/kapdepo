@extends('layouts.app')
@push('scripts')
  <script type="text/javascript">
    localStorage.setItem('csrf', document.getElementsByName('csrf-token')[0].content)
  </script>
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
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
      <div class="company-container" id="company-data"></div>
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

  <style>
    .market-nav {
      padding: 0 20px;
    }

    .market-nav ul {
      /*border-bottom: 3px solid #e0e4e9;*/
      background: #0056b3;
      padding: 10px 0;
      text-align: left;
    }

    .market-nav ul li {
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

    .market-nav .active {
      /*border-bottom: 3px solid #188fff;*/
      background: white;
      color: #0056b3;

    }

    .market-nav ul li a:hover {
      background-color: white;
      color: #0056b3;
      cursor: pointer;
    }

    .table-bonds thead tr:first-child {
      font-weight: bold;
    }

    .table-bonds thead tr:not(first-child) {
      background: #0056b3;
      color: white;
    }

    .dividend-table {
      width: 100%;
    }

    .dividend-table tr td:not(:first-child), .dividend-table tr th:not(:first-child) {
      text-align: right;
    }

    .summary-table {
      margin-left: 20px;
    }

    .summary-table tr {
      border-bottom: 1px solid #e2e5ea;
    }

    .summary-table tr td {
      font-size: 15px;
      font-weight: bold;
      color: #003b7b;
    }

    .summary-table tr td:not(:first-child) {
      font-weight: bold;
      text-align: right;
      padding: 5px 0 3px 15px;
    }

    .summary-table .block {
      position: relative;
    }

    .summary-table .block:hover .info-text {
      display: inline;
      position: absolute;
      top: -20px;
      left: 5px;
      background-color: #0151D3;
      color: white;
      border-radius: 10px;
      padding: 5px 8px;
      text-align: center;
      width: 200%;
    }

    .summary-table .block .info-text {
      display: none;
    }

    #graph, #graph_2 {
      width: 100%;
      height: 80%;
      max-width: 100%;
    }

    #controls {
      overflow: hidden;
      padding-bottom: 3px;
    }

    #controls .amcharts-range-selector-range-wrapper {
      display: none;
    }

    .table-bonds {
      width: 100%;
      margin-bottom: 5%;
    }

    .table-bonds thead tr th {
      padding: 10px 0px 10px 10px;
      border-bottom: 1px solid #efefef;
      font-size: 14px;
    }

    .table-bonds thead tr th:first-child {
      text-align: left;
      padding-left: 10px;
    }

    .table-bonds thead tr th:not(first-child) {
      padding-right: 10px;
    }

    .table-bonds tr td, .table-bonds thead tr th {
      text-align: right;
    }

    .table-bonds tr td:first-child {
      text-align: left;
      width: 1%;
    }

    .table-bonds tbody tr:hover {
      background: #efefef;
    }

    .table-bonds tbody tr td:nth-child(2) {
      text-align: left;
    }

    .table-bonds tbody tr td:last-child {
      padding-right: 10px;
    }

    .table-bonds tbody tr td {
      padding-top: 10px;
      padding-bottom: 10px;
      /*cursor: pointer;*/
      font-weight: bold;
    }

    .table-bonds tbody tr td span {
      font-weight: bold;
    }

    .table-bonds tbody tr td img {
      width: 45px;
      height: 45px;
      object-fit: contain;
      border-radius: 50px;
    }

    .profile-title {
      padding: 0 20px;
      font-weight: bold;
      font-size: 17px;
      margin-top: 30px;
    }

    .profile-category {
      list-style-type: none;
      padding: 0;
    }

    .profile-info {
      padding-left: 20px;
    }

    .profile-info p {
      margin: 0;
    }

    .profile-category span {
      font-weight: bold;
    }

    .profile-table-block, .profile-desc-block {
      padding: 0 20px;
    }

    .profile-table {
      width: 100%;
      /*margin: 0 20px;*/
    }

    .profile-table tr {
      border-bottom: 1px solid #e0e4e9;
    }

    .profile-table th {
      font-size: 13px;
      color: #5b636a;
    }

    .profile-table tr td {
      font-size: 15px;
      padding: 5px 0;
    }

    .profile-desc-block p, .profile-info p, .profile-category li {
      font-size: 15px;
    }

    .report-table h5 {
      font-weight: bold;
      text-align: center;
      margin: 25px;
    }

    .report-filter {
      width: 50%;
      margin: 15px auto;
    }

    .report-filter .form-group {
      display: inline-flex;
      margin: 0 2%;
    }

    .report-filter .form-group label {
      font-weight: bold;
      margin: 0;
      padding: 5px 5px;
    }

    .report-filter .report-filter-btn {
      border: 1px solid #0151D3;
      font-weight: bold;
      color: #0151D3;
      border-radius: 20px;
    }

    .report-filter .report-filter-btn:hover {
      color: white;
      background-color: #0151D3;
    }

    /*table*/

    .report-table table {
      margin: 25px auto !important;
      width: 100% !important;
    }

    .report-table tbody tr td {
      width: auto !important;
      height: auto !important;
      padding: 0px 5px !important;
    }

    .report-table tbody tr:not(:first-child):hover {
      background-color: #e0f0ff !important;

    }

    .report-table tbody tr td {
      background-color: inherit !important;
    }

    .report-table tbody tr td {
      border: none !important;
    }

    .report-table tbody tr:nth-child(even) {
      background-color: #f5f5f7 !important;
    }

    .report-table tbody tr td:first-child {
      font-weight: bold !important;
    }

  </style>
@endsection
