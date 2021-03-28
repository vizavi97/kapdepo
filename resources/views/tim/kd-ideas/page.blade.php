@extends('layouts.app')
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
          <div class="col-md-12">
            <h1>kd-ideas</h1>
            <section class="kd-ideas">
              <div class="kd-ideas-navbar">
                <ul class="nav nav-pills mb-3 d-flex row justify-content-center align-items-center" id="pills-tab"
                    role="tablist">
                  @foreach($kds as  $key => $kd)
                    <li class="nav-item col-md-3">
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
                            UZS {{round(($target  * $info->share_count + $info->box_dividends) - ($info->kd_price * $info->share_count), 2)}}
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
                      <tfoot class="mr-2">
                      <tr>
                        <td></td>
                        <td><small>Стоимость портфеля</small></td>
                        <td><small>Таргет</small></td>
                        <td><small>Доходность портфеля</small></td>
                      </tr>
                      @php
                        $portfolio_profit_percent = (array_reduce($kd,function ($value,$item){
                              $number = isset($item['target']) ? $item['target'] : 0;
                              return $value += $number  * $item['kd-ideas']->share_count;})
                              - $total) / $total * 100
                      @endphp
                      <tr>
                        <td></td>
                        <td><strong>UZS {{$total}}</strong></td>
                        <td><strong>UZS {{
                        //Сумма таргетов
                       array_reduce($kd,function ($value,$item){
                                      $number = isset($item['target']) ? $item['target'] : 0;
                                     return $value += $number  * $item['kd-ideas']->share_count + $item['kd-ideas']->box_dividends;
                                     })


                                     }}</strong></td>

                        <td class="{{$portfolio_profit_percent < 0  ? "text-danger" : "text-success" }}"><strong>{{
                        //Доходность портфеля
                        round($portfolio_profit_percent,2)
                                     }} %</strong></td>

                      </tr>
                      </tfoot>
                    </table>
                    <h2 class="py-3">@lang('Отчет по портфелю')</h2>

                    <table class="market-table kd-ideas-table">
                      <thead>
                      <tr>
                        <th>@lang('Агрессивный')</th>
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
                        <td><small>Ожидаемый доход</small></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><strong>{{$total}}</strong></td>
                        <td><strong>{{$current_portfolio_value}}</strong></td>

                        <td class="{{$percent_profit < 0  ? "text-danger" : "text-success" }}"><strong>{{
                        round($percent_profit,2)
                        }} %</strong></td>
                        <td></td>
                        <td class="{{$total_profit < 0  ? "text-danger" : "text-success" }}">{{$total_profit}}</td>

                      </tr>
                      </tfoot>

                    </table>
                  </div>
                @endforeach

              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>

  </style>
@endsection
