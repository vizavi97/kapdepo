<footer>
    <section class="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="logo-footer">
                        <a href="{{ route('home') }}"><img style="width: 220px;" src="{{ asset('front/img/3.png') }}"></a>
                        <p>© 2005–{{ date('Y') }} Kapital Depozit</p>
                        {{--<a href="{{ route('open.account') }}" class="score">@lang('открыть счет')</a>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="menu-footer">
                        <span>@lang('Наши предложения')</span>
                        <ul>
                            <li>
                                <a href="{{ route('private.page') }}">» @lang('Частным клиентам')</a>
                            </li>
                            <li>
                                <a href="{{ route('corporate.page') }}">» @lang('Корпоративным клиентам')</a>
                            </li>
                            <li>
                                <a href="{{ route('kd.page') }}">» @lang('KD Ideas')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="menu-footer">
                        <span>@lang('О нас')</span>
                        <ul>
                            <li>
                                <a href="{{ route('about.page') }}">» @lang('О нас')</a>
                            </li>
                            <li>
                                <a href="{{ route('about.page') }}#achievments">» @lang('Наши награды')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="menu-footer">
                        <span>@lang('Мы в сетях')</span>
                        <ul>
                            <li class="social-network">
                                <i class="fab fa-facebook-f"></i><a href="{{ $socials->facebook }}">Facebook</a>
                            </li>
                            <li class="social-network">
                                <i class="fab fa-linkedin-in"></i><a href="{{ $socials->twitter }}">LinkedIn</a>
                            </li>
                            <li class="social-network">
                                <i class="fab fa-instagram"></i><a href="{{ $socials->instagram }}">Instagram</a>
                            </li>
                            <li class="social-network">
                                <i class="fab fa-telegram-plane"></i><a href="{{ $socials->google }}">Telegram</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer-description">
{{--                        <p>--}}
                            @switch(app()->getLocale())
                                @case('ru')
                                    {!! $settings->foot_ru !!}
                                @break
                                @case('uz')
                                    {!! $settings->foot_uz !!}
                                @break
                                @case('en')
                                    {!! $settings->foot_en !!}
                                @break
                            @endswitch
{{--                        </p>--}}
                    </div>
                </div>
                <div class="col-12" style="display: none;">
                    <div class="footer-additional">
                        <ul>
                            <li>
                                <a href="{{ route('disclosure.page') }}">@lang('Раскрытие информации')</a>
                            </li>
                            <li>
                                <a href="#">@lang('Cookie')</a>
                            </li>
                            <li>
                                <a href="{{ route('compliance.page') }}">@lang('Compliance')</a>
                            </li>
                            <li>
                                <a href="{{ route('appeal.page') }}">@lang('Написать обращение')</a>
                            </li>
                            <li>
                                <a href="#">@lang('Карта сайта')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
