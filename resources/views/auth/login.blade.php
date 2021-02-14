@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/contact2.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span  style="font-size: 30px; font-weight: bold; border-bottom: 1px solid #0151D3; padding: 10px 0; text-transform: none;">@lang('Войти в личный кабинет')</span>
                                </div>
                                <h1> <br>  </h1>
                                <div class="new-block-text">
                                    <p>  <br> </p>
                                    {{--                                    <a href="#">подробнее</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 10%;">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ваш ID') }}</label>

                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control {{ $errors->has('name') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('name') ?: old('email') }}" required autocomplete="email" autofocus>

                                @if($errors->has('name') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row ">
                            <div class="col-md-6 col-form-label text-md-right">
                                <div class="human-type" style="margin-left: 45%;">
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="remember" id="test" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="test">
                                            {{ __('Запомнить') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>

                        </div>
                        <div class="form-group row ">
                            <button style="margin: 0 auto;" type="submit" class="btn btn-primary">@lang('Войти')</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
