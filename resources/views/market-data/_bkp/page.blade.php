@extends('layouts.app')
@push('scripts')
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
      <table class="market-table" id="market-table">
        <thead>
        <tr>
          <th>@lang('Тикер')</th>
          <th>@lang('Компания')</th>
          <th>@lang('Последняя цена')</th>
          <th>@lang('Изменение')</th>
          <th>@lang('Изменение') %</th>
          <th>@lang('Объём')</th>
          <th>@lang('Рыночная кап.')</th>
          <th>@lang('График за месяц')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comps as $item)
          <tr>
            <td><a href="{{ route('market.company', $item['data']->issuer) }}">{{ $item['data']->issuer }}</a></td>
            <td>{{ $item['data']->title }}</td>
            {{--<td>@foreach($item->data as $t ) {{  $t->last_price  }} @endforeach</td>--}}
            <td>{{  isset($item['data']->data->last_price) ? $item['data']->data->last_price : '-'  }}</td>

            <td><span
                  style="@if($item['change_1'] > 0) color: #39b839; @else color:red; @endif">{{ $item['change_1'] }}</span>
            </td>
            <td><span
                  style="@if($item['change_1'] > 0) color: #39b839;@else  color:red;@endif">%{{ $item['change_2'] }}</span>
            </td>
            <td>{{  isset($item['volume']) ? $item['volume'] : '-' }}</td>

            <td>
              {{ $item['market_cap'] }}

            </td>

            <td class="count-charts" style="width: 70px;">
              <span class="company_id" style="display: none;">{{ $item['data']->id }}</span>
              @php
                if(isset($item['data']->last_month->last_price) && isset($item['data']->curr_month->last_price)){

                    if($item['data']->last_month->last_price > $item['data']->curr_month->last_price){
                        $color = '#FF0000';
                    }else{
                        $color = '#39b839';
                    }
                }
              @endphp
              <span class="color{{ $item['data']->id }}" style="display: none;">{{ isset($color) ? $color : '' }}</span>
              <div class="chart-{{ $item['data']->id }}" style="float: right" id="graph{{ $item['data']->id }}"></div>
            </td>
          </tr>
        @endforeach


        </tbody>
      </table>
    </div>
  </div>
  @push('main-chart')
    <script type="text/javascript" src="{{asset('front/js/highchart/highcharts.js')}}"></script>
  @endpush
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

  <script type="text/javascript">
    $(document).ready(function () {
      var CSRF_TOKEN = $('meta[name=csrf-token]').attr('content');

      // var count = $(".count-charts").length;
      // console.log(count);

      var work;

      function chart(data, id, color) {

        Highcharts.chart('graph' + id, {
          chart: {
            zoomType: 'x',
            height: 50,
            width: 100,
            margin: [5, 0, 5, 0]

          },
          navigation: {
            buttonOptions: {
              enabled: false
            }
          },
          tooltip: {enabled: false},
          credits: {enabled: false},
          title: {
            text: 'USD to EUR exchange rate over time',
            style: {display: 'none'}
          },

          xAxis: {
            labels: {enabled: false},
            gridLineWidth: 0,
          },
          yAxis: {
            title: {text: false},
            gridLineWidth: 0,
            labels: {enabled: false},
          },
          legend: {enabled: false},
          plotOptions: {
            area: {
              fillColor: {
                linearGradient: {
                  x1: 0,
                  y1: 0,
                  x2: 2,
                  y2: 2,
                },
                stops: [
                  // [0, '#FF0000'], red
                  [0, color],
                  [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(1).get('rgba')]

                ]
              },
              marker: {radius: 2},
              lineWidth: 1,
              states: {
                hover: {enabled: false, lineWidth: 2}
              },
              threshold: null
            }
          },

          series: [{
            type: 'area',
            // name: 'USD to EUR',
            data: data,
            color: color,
          }]
        });
      }

      function getData(id, color) {
        $.ajax({
          type: 'POST',
          url: '/market-data/market-json/' + id,
          dataType: 'JSON',
          data: {_token: CSRF_TOKEN},
          success: function (data) {
            work = data;
            // console.log(data)
          }
        }).done(function (data) {
          work = data;
          chart(data, id, color);

        });

      }

      // for (i=0; i<$(".count-charts").length; i++){
      //     var id = $(".count-charts .company_id").text()[i];
      //     // console.log(id);
      //     var color = $(".count-charts .color"+id).text();
      //     getData(id, color);
      //
      // }

      $(".count-charts .company_id").each(function (index) {
        // console.log( $( this ).text() );
        var id = $(this).text();
        var color = $(".count-charts .color" + id).text();
        getData(id, color);
      });

    })
  </script>
@endsection
