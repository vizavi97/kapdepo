


<section class="why-are-we" style="background: url({{ asset('front/why-2.jpg') }}) no-repeat; background-size: cover; background-position: top;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="why-are-we-title">
                    <h4>@lang('почему') <span>@lang('выбирают нас')</span></h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="border-after top"></div>
                <div class="border-after left"></div>
                <div class="border-after right"></div>
                <div class="border-after bootom"></div>
                <div class="all-column" id="border-none">
                    <div class="all-column-img" id="all-column-img1"></div>
                    <b>01</b>
                    <span class="colum-titl">@lang('НАШИ ИДЕИ')</span>
                    <ul>
                        <li>
                            <a href="{{ route('kd.index') }}">@lang('Индекс')</a>
                        </li>
                        <li>
                            <a href="{{ route('market.page') }}">@lang('Последние котировки')</a>
                        </li>

                        <li>
                            <a href="{{ route('kd.page') }}">@lang('Аналитические обзоры')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="border-after top"></div>
                <div class="border-after left"></div>
                <div class="border-after right"></div>
                <div class="border-after bootom"></div>
                <div class="all-column" id="border-none">
                    <div class="all-column-img" id="all-column-img2"></div>
                    <b>02</b>
                    <span class="colum-titl">@lang('ПОЧЕМУ МЫ')?</span>
                    <ul>

                        <li>
                            <a href="{{ route('about.page') }}#statistic">@lang('15 лет успешной деятельности')</a>
                        </li>
                        <li>
                            <a href="{{ route('offers.page') }}#tariff">@lang('Качественный сервис по умеренным ценам')</a>
                        </li>
                        <li>
                            <a href="{{ route('about.page') }}#statistic">@lang('Финансовая устойчивость и стабильность') </a>
                        </li>
                        <li>
                            <a href="{{ route('about.page') }}#team">@lang('Обучение')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-6">
                <div class="border-after top"></div>
                <div class="border-after left"></div>
                <div class="border-after right"></div>
                <div class="border-after bootom"></div>
                <div class="all-column" id="border-none">
                    <div class="all-column-img" id="all-column-img3"></div>
                    <b>03</b>
                    <span class="colum-titl">@lang('НАШИ КЛИЕНТЫ') - <span class="our-achievements">@lang('НАШИ ДОСТИЖЕНИЯ')</span></span>
                    <ul>
                        <li>
                            <a href="{{ route('partners.page') }}">@lang('Наши прайм партнёры')</a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="#">» Крупнейшие проекты</a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="#">{{ $stats->clients_count }} @lang('клиентов')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    main .why-are-we #border-none {
        border: none !important;
    }
    .border-after {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 15px;
        left: 15px;
    }
     .border-after::after {
        border: 1px solid #fff;
    }
     .border-after.top::after {
        top: 0;
        position: absolute;
        content: '';
        display: block;
        height: 75px;
    }
     .border-after.left::after {
        position: absolute;
        content: '';
        display: block;
        height: 1px;
        left: 0;
        right: 0;
        width: 100px;
    }
     .border-after.right::after {
        position: absolute;
        content: '';
        display: block;
        height: 1px;
        right: 0;
        bottom: 0;
        width: 240px;
    }
    .border-after.bootom::after {
        position: absolute;
        content: '';
        display: block;
        height: 315px;
        right: 0;
        bottom: 0;
    }
</style>
