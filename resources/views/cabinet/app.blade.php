<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#3db7e8">
    <link rel="icon" type="image/png"  href="{{asset('front/img/favicon.png')}}">

    <title>Kapdepo</title>

    <link href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('front/css/slick.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('front/css/media.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="{{ asset('front/js/modernizr.custom.97074.js') }}"></script>
</head>
<body>
<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.hoverdir.js') }}"></script>

@include('layouts.header')
<style type="text/css">
    .main-wrap{
        position: relative;
    }
    .test-block{
        background: url(http://kapdep.loc/front/director-back.png) no-repeat bottom;
        background-size: cover;
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        height: 100px;
    }
</style>
<main style="padding: 90px 0"  class="main-wrap">
    <div class="test-block">

    </div>
    <section>
        @if(Route::currentRouteName() != 'get.pnl')
            <div class="container">
                <div class="row">
                        @include('cabinet.sidebar')
                     @yield('content')

                </div>
            </div>
        @else
            @yield('content')
        @endif
    </section>

</main>

@include('layouts.footer')

<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.hoverdir.js') }}"></script>
@stack('scripts')
{{--        <script>--}}
{{--            (function(w,d,u){--}}
{{--                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);--}}
{{--                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);--}}
{{--            })(window,document,'https://kapdepo.bx24.uz/upload/crm/site_button/loader_1_aoy5fx.js');--}}
{{--        </script>--}}
</body>
</html>
