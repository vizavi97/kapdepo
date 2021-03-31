@extends('layouts.app')
@push('styles')
  <link rel="stylesheet" href="{{asset('./css/tim/steps.css')}}"/>
  <link rel="stylesheet" href="{{asset('./css/tim/kd-ideas.css')}}"/>
  <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/stocktools/gui.css">
  <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/annotations/popup.css">

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
                  <span class="title-span">kd-ideas</span>
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
        <h2 id="company-title"> kd-ideas</h2>
        <ul class="breadcrumbs">
          <li>
            <a href="{{ route('home') }}">@lang('Главная')</a>
          </li>
          <li><a href="{{ route('market.page') }}">kd-ideas</a></li>
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
          <div class="col-md-12 p-sm-0">
            <h1>kd-ideas</h1>
            <section class="kd-ideas">
              <div class="kd-ideas-navbar">
                <ul class="nav nav-pills mb-3 d-flex row justify-content-center align-items-center" id="pills-tab"
                    role="tablist">
                  @foreach($kds as  $key => $kd)
                    <li class="nav-item col-md-3 mb-2">
                      <a class="nav-link kd-ideas-navbar-item {{$loop->first ? "active" : null}}"
                         id="pills-home-{{$key}}-tab"
                         data-toggle="pill"
                         href="#pills-home-{{$key}}" role="tab"
                         aria-controls="pills-{{$key}}" aria-selected="true">
                        <span>@lang('Портфель')</span>
                        <span><strong>{{$key}}</strong></span>
                      </a>
                    </li>
                  @endforeach
                </ul>

              </div>
              <div class="tab-content" id="pills-tabContent">
                @foreach($kds as $key => $kd)
                  <div class="tab-pane fade {{$loop->first ? "show active" : null}}"
                       id="pills-home-{{$key}}" role="tabpanel"
                       aria-labelledby="pills-home-{{$key}}-tab">
                    <table class="market-table kd-ideas-table">
                      <thead>
                      <tr>
                        <th>@lang('Тикер')</th>
                        <th>@lang('Кол-во ЦБ')</th>
                        <th>@lang('Цена') {{array_values($kd)[0]['kd-ideas']->date}}</th>
                        <th>@lang('Сумма инвестиций')</th>
                        <th>@lang('Обьем портфеля')</th>
                        <th>@lang('Таргет прайс')</th>
                        <th>@lang('Потенциал роста')</th>
                        <th>@lang('Ожидаемые дивиденды')</th>
                        <th>@lang('Прогнозный доход от инвестиций')</th>
                        <th>%</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($kd as $item)
                        @php
                          $company = $item['company'];
                          $info = $item['kd-ideas'];
                          $target = isset($item['target']) ? $item['target'] : 0;
                          $total = array_reduce($kd,function($value, $item){
                                $value += $item['kd-ideas']->kd_price * $item['kd-ideas']->share_count;
                                 return $value;
                            }, 0)
                        @endphp
                        <tr>

                          <td>{{$company->issuer}}</td>
                          <td>{{$info->share_count}}</td>
                          <td>UZS {{$info->kd_price}}</td>
                          <td>UZS {{round($info->kd_price * $info->share_count,2)}}</td>
                          <td>{{round(($info->kd_price * $info->share_count)/ $total * 100,2)}} %</td>
                          <td>{{isset($info->getTarget) ? "UZS $target" : "-"}}</td>
                          <td class="{{($target  - $info->kd_price) / $info->kd_price < 0  ? "text-danger" : "text-success" }}">
                            {{round(($target  - $info->kd_price) / $info->kd_price * 100, 2)}} %
                          </td>
                          {{--                          Ожидаемые дивиденды--}}
                          <td>
                            UZS {{$info->box_dividends}}
                          </td>
                          {{--                          Прогнозный доход--}}
                          <td class="{{($target  - $info->kd_price) / $info->kd_price < 0  ? "text-danger" : "text-success" }}">
                            UZS {{round(($target  * $info->share_count + $info->box_dividends * $info->share_count) - ($info->kd_price * $info->share_count), 2)}}
                          </td>
                          {{--                          процент--}}
                          <td class="{{($target  - $info->kd_price) / $info->kd_price < 0  ? "text-danger" : "text-success" }}">
                            {{round(((($target * $info->share_count) + $info->box_dividends) -  ($info->kd_price * $info->share_count))
                            / ($info->kd_price * $info->share_count) * 100
                            , 2)}}
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <table class="market-table  kd-ideas-table">
                      <thead>
                      <tr>
                        <th class="text-center">Стоимость портфеля</th>
                        <th class="text-center">Таргет</th>
                        <th class="text-center">Доходность портфеля</th>
                      </tr>
                      </thead>
                      @php
                        $portfolio_profit_percent = (array_reduce($kd,function ($value,$item){
                              $number = isset($item['target']) ? $item['target'] : 0;
                              return $value += $number  * $item['kd-ideas']->share_count;})
                              - $total) / $total * 100
                      @endphp
                      <tbody>
                      <tr>
                        <td class="text-center"><strong>UZS {{$total}}</strong></td>
                        <td class="text-center"><strong>UZS {{
                        //Сумма таргетов
                       array_reduce($kd,function ($value,$item){
                                      $number = isset($item['target']) ? $item['target'] : 0;
                                     return $value += $number  * $item['kd-ideas']->share_count + $item['kd-ideas']->box_dividends * $item['kd-ideas']->share_count;
                                     })


                                     }}</strong></td>

                        <td class="{{$portfolio_profit_percent < 0  ? "text-danger" : "text-success" }} text-center"><strong>{{
                        //Доходность портфеля
                        round($portfolio_profit_percent,2)
                                     }} %</strong></td>

                      </tr>
                      </tbody>

                    </table>
                    <h2 class="py-3">@lang('Отчет по портфелю')</h2>

                    <table class="market-table kd-ideas-table">
                      <thead>
                      <tr>
                        <th>@lang('Тикер')</th>
                        <th>@lang('Кол-во ЦБ')</th>
                        <th>@lang('Цена') {{array_values($kd)[0]['kd-ideas']->date}}</th>
                        <th>@lang('Текущая цена')</th>
                        <th>@lang('Рост')</th>
                        <th>@lang('Прибыль') UZS</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($kd as $item)
                        @php
                          $company = $item['company'];
                          $info = $item['kd-ideas'];
                          $target = isset($item['target']) ? $item['target'] : 0;
                          $last_price = $company->last_price_default->last_price;
                          $growth = (($info->share_count * $last_price ) - ($info->kd_price * $last_price ))
                                                      /($info->kd_price * $last_price );
                          $profit = ($info->share_count * $last_price ) - ($info->kd_price * $last_price );
                          $total = array_reduce($kd,function($value, $item){
                                $value += $item['kd-ideas']->kd_price * $item['kd-ideas']->share_count;
                                 return $value;
                            }, 0)
                        @endphp

                        <tr>

                          <td>{{$company->issuer}}</td>
                          <td>{{$info->share_count}}</td>
                          <td>UZS {{$info->kd_price}}</td>
                          <td>UZS {{$last_price}}</td>
                          <td class="{{$growth < 0  ? "text-danger" : "text-success" }}">
                            {{round($growth,2) * 100}}
                            %
                          </td>
                          <td class="{{$profit < 0  ? "text-danger" : "text-success" }}">UZS {{round($profit,2)}}</td>
                      </tbody>
                      @endforeach
                      @php

                        $current_portfolio_value = array_reduce($kd,function ($value,$item){
                                       return $value += $item['kd-ideas']->share_count * $item['company']->last_price_default->last_price;
                                       });
                        $total_profit = array_reduce($kd,function ($value,$item){
                                       return $value += ($item['kd-ideas']->share_count * $item['company']->last_price_default->last_price ) - ($item['kd-ideas']->kd_price * $item['company']->last_price_default->last_price );
                                       });
                        $percent_profit = ($current_portfolio_value - $total) / $total * 100;

                      @endphp
                      <tfoot class="mr-2">
                      <tr>
                        <td></td>
                        <td><small>Стоимость портфеля</small></td>
                        <td><small>Текущая стоимость</small></td>
                        <td><small>Прибыль по портфелю</small></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><strong>{{$total}}</strong></td>
                        <td><strong>{{$current_portfolio_value}}</strong></td>

                        <td class="{{$percent_profit < 0  ? "text-danger" : "text-success" }}"><strong>{{
                        round($percent_profit,2)
                        }} %</strong></td>
                        <td></td>
                      </tr>
                      </tfoot>

                    </table>
                  </div>
                @endforeach

              </div>
            </section>
            <div class="row">
              <div class="col-md-12">
                <nav class="market-nav">
                  <ul>
                    <li><a class="{{ request()->has('year') ? '' : 'active' }}"
                           href="{{ route('kd-ideas.page') }}"><span>@lang('1 month')</span></a></li>
                    <li><a class="{{ request()->has('year') ? 'active' : '' }}"
                           href="{{ route('kd-ideas.page', 'year=1') }}"><span>@lang('1 year')</span></a></li>
                  </ul>
                  @if(request()->has('year'))
                    <input type="hidden" id="year" value="1">
                  @endif
                </nav>
                <p class="period">@lang('Period'):
                  <span>{{ date("d-m-Y",mktime(0,0,0,date('m')-1, date('d'), date('Y'))) }}</span> -
                  <span>{{ date('d.m.Y') }}</span></p>
              </div>
              <div class="col-md-12">
                <div id="speedChart" width="600" height="400"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    {{--    <script type="text/javascript" src="{{asset('front/js/highchart/highcharts.js')}}"></script>--}}
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/indicators/indicators-all.js"></script>
    <script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script>

    <script src="https://code.highcharts.com/modules/annotations-advanced.js"></script>
    <script src="https://code.highcharts.com/modules/price-indicator.js"></script>
    <script src="https://code.highcharts.com/modules/full-screen.js"></script>

    <script src="https://code.highcharts.com/modules/stock-tools.js"></script>

  @endpush

  <script type="text/javascript">

    $(document).ready(function () {
      var CSRF_TOKEN = $('meta[name=csrf-token]').attr('content');
      var labels;
      var vals;
      var int = {_token: CSRF_TOKEN, year: $('#year').val() ? $('#year').val() : 0}


      function time(value) {
        const timezone = new Date(value);
        return timezone.getDate() + '-' + timezone.getMonth() + '-' + timezone.getFullYear();
      }


      function chart(data) {
        $('#speedChart').highcharts({
          title: null,
          chart: {
            type: 'line'
          },

          credits: {
            enabled: false
          },
          navigation: {
            buttonOptions: {
              enabled: false
            }
          },

          xAxis: {
            type: 'datetime',
            labels: {
              rotation: -90,
              formatter: function () {
                // return  time(this.value) ;
                return Highcharts.dateFormat(" %d-%m-%Y", this.value);
              }
            }
          },

          tooltip: {
            shared: true,
            useHTML: true,
            headerFormat: '<table>',
            pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' +
              '<td style="text-align: right"><b>{point.y}</b></td> </tr>',
            footerFormat: '</table>',
            // xDateFormat: '%Y-%m-%d',
            formatter: function () {
              var s = '<b>' + Highcharts.dateFormat('%a, %d-%m-%Y', this.x) + '</b>';
              $.each(this.points, function (i, point) {
                s += '<br/><span style="color:' + point.series.color + '">' + point.series.name + '</span>: ' + point.y;
              });
              return s;
            },
            valueDecimals: 3,


          },
          yAxis: {
            title: null,
            labels: {
              format: '{value:.3f}'
            }
          },
          series: [{
            name: 'Index',
            data: data
          }],
          responsive: {
            rules: [{
              condition: {
                maxWidth: 800
              },
              chartOptions: {
                rangeSelector: {
                  inputEnabled: false
                }
              }
            }]
          },
        });
      }

      function getData() {
        $.ajax({
          type: 'POST',
          url: '/kd-ideas/get-index',
          dataType: 'JSON',
          data: int,
          success: function (data) {

          }
        }).done(function (data) {
          const test = data;
          const map1 = test.map(x => [(x[0] + 18000) * 1000, x[1]]);
          chart(map1);

        });
      }

      getData();
    });
  </script>
  <style>
    .info-block p {
      text-indent: 2em;
    }

    .period {
      text-align: center;
    }

    .period span {
      font-weight: bold;
      padding: 0 10px;
    }

    .market-nav {
      padding: 0 20px;
    }

    .market-nav ul {
      border-bottom: 3px solid #e0e4e9;
      padding: 10px 0;
      text-align: center;
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
      color: #0151D3;
    }

    .market-nav .active {
      border-bottom: 3px solid #188fff;

    }

    .market-nav ul li a:hover {
      background-color: #e0f0ff;
    }
  </style>

@endsection
