@extends('layouts.app')
@section('breadcrumb')
    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Написать обращение')</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>@lang('Написать обращение')</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section id="open-account-block" class="open-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <script id="bx24_form_inline" data-skip-moving="true">
                            (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
                                (w[b].forms=w[b].forms||[]).push(arguments[0])};
                                if(w[b]['forms']) return;
                                var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
                                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                            })(window,document,'https://kapdepo.bx24.uz/bitrix/js/crm/form_loader.js','b24form');

                            b24form({"id":"10","lang":"ru","sec":"nokngk","type":"inline"});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection