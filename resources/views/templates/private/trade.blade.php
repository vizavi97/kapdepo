<section class="why-are-we" id="trading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="why-are-we-title">
                    <h4>@lang('Трейдинг')</h4>
                    <p>
                        @switch(App::getLocale())
                            @case('ru')
                                Прямой доступ к торговым площадкам Узбекистана. Торгуйте с ценными бумагами онлайн.

                            @break
                            @case('en')
                            Direct access to the trading floors of Uzbekistan. Trade securities online.

                            @break

                            @case('uz')
                            O'zbekiston savdo maydonchalariga to'g'ridan-to'g'ri kirish. Qimmatli qog'ozlar bilan on-line savdo qiling.

                            @break
                        @endswitch
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="all-column" style="padding-top: 25%;">
                    <div class="all-column-img" id="all-column-img1" style="background: url({{ asset('front/icons/white/1k.png')}}) no-repeat center; background-size: contain;" ></div>
                    <b>01</b>
                    <span>@lang('Акции')</span>
                    <ul>
{{--                        <li>--}}
{{--                            <a href="{{ route('private.stocks.page') }}">» @lang('перейти на страницу') </a>--}}
{{--                        </li>--}}
                    </ul>

                    <div class="fixed-block">
                        <div class="fixed-text">
                            <div>
                                <div class="tile__tit">@lang('Акции')</div>
                                <div class="tile__desc">
                                    @switch(App::getLocale())
                                        @case('ru')
                                            Торгуйте с акциями крупнейших компаний Узбекистана на торговых площадках: Республиканская фондовая биржа "Тошкент" (РФБ), электронная система внебиржевых торгов "Elsis Savdo"                                        @break
                                        @case('en')
                                            Trade with stocks of the largest companies of Uzbekistan on trading floors: Republican Stock Exchange "Toshkent" (RSE), electronic OTC trading system "Elsis Savdo"
                                        @break

                                        @case('uz')
                                            O'zbekistondagi eng yirik kompaniyalar aksiyalari bilan savdo qiling: "Toshkent" Respublika fond birjasi (RSE), "Elsis Savdo" elektron savdo tizimi
                                        @break

                                    @endswitch
                                <p><a href="{{ route('private.stocks.page') }}">» @lang('перейти на страницу') </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="all-column"  style="padding-top: 25%;">
                    <div class="all-column-img" id="all-column-img2" style="background: url({{ asset('front/icons/white/bonds.png')}}) no-repeat center; background-size: contain;"></div>
                    <b>02</b>
                    <span>@lang('Облигации')</span>
                    <ul>
{{--                        <li>--}}
{{--                            <a href="{{ route('private.bonds.page') }}">» @lang('перейти на страницу')</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="fixed-block">
                        <div class="fixed-text">
                            <div>
                                <div class="tile__tit">@lang('Облигации')</div>
                                <div class="tile__desc">
                                    @switch(App::getLocale())
                                        @case('ru')
                                        Инвестируйте в корпоративные облигации и получайте высокий фиксированный доход
                                        @break
                                        @case('en')
                                        Invest in corporate bonds and earn high fixed income
                                        @break

                                        @case('uz')
                                        Korporativ obligatsiyalarni investitsiya qiling va qat’iy belgilangan yuqori daromadni oling
                                        @break

                                    @endswitch
                                    <p>
                                        <a href="{{ route('private.bonds.page') }}">» @lang('перейти на страницу')</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-6">
                <div class="all-column"  style="padding-top: 25%;">
                    <div class="all-column-img" id="all-column-img3"  style="background: url({{ asset('front/icons/white/14k.png')}}) no-repeat center; background-size: contain;"></div>
                    <b>03</b>
                    <span>@lang('Как начать -  ТОРГОВАТЬ')</span>
                    <ul>
{{--                        <li>--}}
{{--                            <a href="{{ route('private.trade.page') }}">» @lang('перейти на страницу')</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="fixed-block">
                        <div class="fixed-text">
                            <div>
                                <div class="tile__tit">@lang('Как начать -  ТОРГОВАТЬ')</div>
                                <div class="tile__desc">
                                    @switch(App::getLocale())
                                        @case('ru')
                                        Тысячи клиентов инвестируют вместе с нами.
                                        Старейшая инвестиционная компания в Узбекистане
                                        @break
                                        @case('en')
                                        Thousands of clients invest with us.
                                        The oldest investment company in Uzbekistan

                                        @break

                                        @case('uz')
                                        Minglab mijozlar biz bilan birga investitsiya qiladilar.
                                        O'zbekistondagi eng malakali investitsiya kompaniyasi

                                        @break

                                    @endswitch
                                    <p>
                                        <a href="{{ route('private.trade.page') }}">» @lang('перейти на страницу')</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
