@extends('layouts.app')
@section('main_head')
  @push('styles')
    <link rel="stylesheet" href="{{asset('./css/tim/steps.css')}}"/>
  @endpush
  <section class="banner-section">
    <div class="banner-page-new">
      <div class="item">
        <div class="bg_header"
             style="background: url({{ asset('front/start-trade.jpg') }}) no-repeat; background-size: cover; background-position: bottom;"></div>
        <div class="item-banner">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="slider-wrapper__section">
                  <span class="title-span">@lang('Как начать торговать')</span>
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
        <h2>@lang('Как начать торговать')</h2>
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
  <section class="anch" id="">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="solutions test-trade">
            <div class="row" id="row-tiitle">
              <div class="col-12" id="following">
                <div class="following">
                  <h3>
                    <span><i class="fas fa-users"></i></span>
                    @switch(App::getLocale())
                      @case('ru')
                      Тысячи клиентов уже инвестируют вместе с нами. <br> Станьте одним из них.
                      @break
                      @case('uz')
                      Minglab mijozlar biz bilan investitsiya qilmoqda.<br> Ulardan biriga aylaning.
                      @break
                      @case('en')
                      Thousands of clients are already investing with us.<br> Become one of them.
                      @break
                    @endswitch
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="accordion trade-steps" id="accordionExample">
        @foreach ($steps as $step)
          <div class="trade-step">
            <div class="trade-step-headline collapsed" id="heading-{{$step->id}}" data-toggle="collapse"
                 data-target="#collapse-{{$step->id}}"
                 aria-expanded="true" aria-controls="collapse-{{$step->id}}">
              <span>{{$step->position}}</span>
              <h4>{{$step->title}}</h4>
            </div>
            <div id="collapse-{{$step->id}}" class="trade-step-body collapse" aria-labelledby="heading-{{$step->id}}"
                 data-parent="#accordionExample">
              <p>
                {{$step->text}}
              </p>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>



  <style type="text/css">
    .start-block p, .start-block ol li {
      font-weight: bold;
    }

    .start-block ol li {

    }

    .info-block {
      margin-bottom: 30px;
    }

    .info-block p {
      margin: 0;
      font-weight: bold;
    }

    .test-trade {
      border: 1px solid #5b636a !important;
      border-radius: 40px !important;
    }

    .test-trade h3 {
      color: #000;
      font-weight: bold;
      text-align: center;
      margin: 0;
    }

    .test-trade .following {
      display: block;

    }

    .test-trade h3 span {
      padding-right: 10px;
    }

    .test-trade h3 span i {
      color: #0c439b;
    }

    .test-trade .white-tick i {
      color: #0c439b;
    }

    .test-trade .white-tick {
      padding: 0px 25px 35px 25px;
    }
  </style>
@endsection
