<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
  <title>{{ $settings->sitename }}</title>
  <link rel="icon" type="image/png" href="{{asset('front/img/favicon.png')}}">

  <link href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('front/css/slick.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('front/css/style.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('front/css/media.css') }}" type="text/css" rel="stylesheet">
  {{--    <link href="{{ asset('front/js/heats/heatmap.css') }}" type="text/css" rel="stylesheet">--}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  @stack('styles')
  @stack('styles')
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="{{ asset('front/js/modernizr.custom.97074.js') }}"></script>
  <!-- Scripts -->
  {{--<script src="{{ asset('js/app.js') }}"></script>--}}
  <style>
    div#breadcrumb-wrapper {
      clear: both;
      margin-bottom: -1px;
      min-height: 1px;
    }

    /*header section.banner-section {*/
    /*height: 741px;*/
    /*}*/
  </style>

  <!-- Styles -->
  {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
  <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      var test = window.location.hash;
      if (window.location.hash) {
        // console.log(window.location.hash);
        document.getElementsByTagName('body')[0].setAttribute("class", "mod");

      }
      $('.banner').on('init', function (event, slick) {
        if (!$('body').hasClass('home-page') && !$('body').hasClass('mod')) {
          $('body, html').animate({
            scrollTop: $('#breadcrumb-wrapper').offset().top - 100
          }, 1000, 'swing', function () {
          });
        }
      });

    });
  </script>


</head>
<body @if(Route::currentRouteName() == 'home') class="home-page" @endif>
@include('layouts.header')
{{--        <main  @if(Route::currentRouteName() == 'home') class="main-padding"  @endif>--}}
<main class="main-wrap">

  {{--@if(stristr(Request::url() ,'#') === true)--}}
  {{--{{ 'yes' }}--}}
  {{--@endif--}}
  {{--            {{ Request::url() }}--}}
  @yield('back-ground')
  @if(Route::currentRouteName() != 'home')
    <div id="breadcrumb-wrapper" style="position: sticky;">
      @yield('breadcrumb')
    </div>
  @endif
  @yield('content')
</main>
@include('layouts.footer')
{{--        <div class="fixed">--}}
{{--            <button class="big-button" id="toggle-assistance">--}}
{{--                <img src="{{ asset('front/img/phone-info.png') }}">--}}
{{--                <i class="close">×</i>--}}
{{--            </button>--}}
{{--            <div class="buttons-group">--}}
{{--                <a href="#" class="small-button" data-toggle="modal">--}}
{{--                    <img src="{{ asset('front/img/sms.png') }}">--}}
{{--                </a>--}}
{{--                <a href="#" class="small-button" data-toggle="modal" data-target="#request-call">--}}
{{--                    <img src="{{ asset('front/img/fixed-phone.png') }}">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="modal fade" id="request-call" tabindex="-1" role="dialog" aria-labelledby="request-call" aria-hidden="true">--}}
{{--                <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                    <div class="modal-content">--}}
{{--                        <form method="POST">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h5 class="modal-title" id="exampleModalLabel">Заказать звонок</h5>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">×</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" placeholder="Ваше имя" name="name" id="callback-name" required="required">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" placeholder="Ваш номер телефона" name="phone" type="tel" id="callback-phone" required="required">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="send-callback">--}}
{{--                                <button type="button" id="send_callback" class="btn btn-primary">Отправить</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--log in form--}}
@guest
  @include('layouts.login-form')
@endguest

{{--<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>--}}
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/jquery.hoverdir.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

{{--<script type="text/javascript" src="{{ asset('style/plugins/chart.js/Chart.min.js') }}"></script>--}}

{{--        <script type="text/javascript" src="{{asset('front/js/highchart/highcharts.js')}}"></script>--}}
@stack('main-chart')
{{--<script type="text/javascript" src="{{asset('front/js/highchart/highstock.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('front/js/highchart/data.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/highchart/exporting.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/highchart/export-data.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/highchart/accessibility.js')}}"></script>


{{--<script type="text/javascript" src="{{asset('front/js/waypoints/lib/jquery.waypoints.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('front/js/jquery.counterup.min.js')}}"></script>--}}
<script type="text/javascript">
  $(function () {
    $('.all-column').each(function () {
      $(this).hoverdir();
    });
  });
</script>
<script>
  AOS.init();
</script>
@stack('scripts')
@stack('heats')
{{--        <script>--}}
{{--            (function(w,d,u){--}}
{{--                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);--}}
{{--                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);--}}
{{--            })(window,document,'https://kapdepo.bx24.uz/upload/crm/site_button/loader_1_aoy5fx.js');--}}
{{--        </script>--}}
</body>
</html>
