<div class="fixed-remove"></div>
<div class="overlay"></div>
<div class="mobile-menu">
    <div class="menu">
        <div class="log-reg-btn">
            @guest
                <a href="#" class="to-come-in" data-toggle="modal" data-target="#request-call1">
                    <i class="fas fa-sign-in-alt"></i>@lang('Войти')
                </a>
            @endguest
            @auth
                    <a href="{{ route('logout') }}" class="to-come-in">
                        <i class="fas fa-sign-out-alt"></i>@lang('Выход')
                    </a>
            @endauth
            <a href="{{ route('open.account') }}#open-account-block" class="to-come-in" id="open-an-account">Открыть счет</a>
        </div>
        <div class="languages">
            @switch(app()->getLocale())
                @case('ru')
                <li><a href="#" class="languages_ru">ru</a></li>
                <li><a href="{{ route('lang', ['locale' => 'en']) }}">en</a></li>
                <li><a href="{{ route('lang', ['locale' => 'uz']) }}">uz</a></li>
                @break
                @case('en')
                <li><a href="{{ route('lang', ['locale' => 'ru']) }}">ru</a></li>
                <li><a href="#" class="languages_ru">en</a></li>
                <li><a href="{{ route('lang', ['locale' => 'uz']) }}">uz</a></li>
                @break
                @case('uz')
                <li><a href="{{ route('lang', ['locale' => 'ru']) }}">ru</a></li>
                <li><a href="{{ route('lang', ['locale' => 'en']) }}">en</a></li>
                <li><a href="#" class="languages_ru">uz</a></li>
                @break
            @endswitch
        </div>
    </div>
    <div id="accordion">
        <div class="card">
            @include('layouts.adaptive-menu')
        </div>
    </div>
</div>
<header id="sticky">
    <div class="fixed-header">
        <section class="top">
            <div class="container">
                <div class="row" id="header-row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('front/img/logo1111.png') }}">
                            </a>
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('front/img/logo1111.png') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-8 col-sm-6">
                        <div class="menu">
                            <nav>
                                <ul>
                                    @include('layouts.menu')
                                </ul>
                            </nav>
                            <a href="{{ route('logout') }}" class="to-come-in" >
                                <i class="fas fa-sign-out-alt"></i>@lang('Выход')
                            </a>
                            <div class="active-dropdown">
                                <div class="languages-active">
                                    <a href="javascript:void(0);" class="languages">
                                        <img src="{{ asset('front/img/languages.png') }}" class="icon-languages-img">
                                        <img src="{{ asset('front/img/languages-black.png') }}" class="languages-black"> {{ app()->getLocale() }}
                                        <img src="{{ asset('front/img/icon-languages-black.png') }}" class="languages-black fixed-img">
                                        <img src="{{ asset('front/img/icon-languages.png') }}" class="icon-languages-img">
                                    </a>
                                </div>
                                <div class="languages-dropdown">
                                    <ul>
                                        @switch(app()->getLocale())
                                            @case('ru')
                                            <li>
                                                <a href="{{ route('lang', ['locale' => 'en']) }}"><img src="{{ asset('front/img/languages-black.png') }}">en</a>
                                                <div class="triangle"></div>
                                            </li>
                                            <li>
                                                <a href="{{ route('lang', ['locale' => 'uz']) }}"><img src="{{ asset('front/img/languages-black.png') }}">uz</a>
                                            </li>
                                            @break
                                            @case('uz')
                                            <li>
                                                <a href="{{ route('lang', ['locale' => 'ru']) }}"><img src="{{ asset('front/img/languages-black.png') }}">ru</a>
                                                <div class="triangle"></div>
                                            </li>
                                            <li>
                                                <a href="{{ route('lang', ['locale' => 'en']) }}"><img src="{{ asset('front/img/languages-black.png') }}">en</a>
                                            </li>
                                            @break
                                            @case('en')
                                            <li>
                                                <a href="{{ route('lang', ['locale' => 'ru']) }}"><img src="{{ asset('front/img/languages-black.png') }}">ru</a>
                                                <div class="triangle"></div>
                                            </li>
                                            <li>
                                                <a href="{{ route('lang', ['locale' => 'uz']) }}"><img src="{{ asset('front/img/languages-black.png') }}">uz</a>
                                            </li>
                                            @break
                                        @endswitch

                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('open.account') }}#open-account-block" class="to-come-in" id="open-an-account">@lang('Открыть счет')</a>
                            <button class="toggle-nav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>
