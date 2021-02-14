@extends('cabinet.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/pnl-new.jpg') }}) no-repeat; background-size: 101%; background-position: center;opacity: 0.8;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">

                                    <span class="title-span">@lang('Profit & Loss')</span>
                                    <span class="bor"></span>

                                </div>
                                <h1></h1>
                                <div class="new-block-text">
                                    <p>  <br> </p>
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
    <div class="col-lg-9">
        <div class="user-detail">
            <ul class="new-row-table">
                <li>@lang('Изменить пароль')</li>

            </ul>
            @if(session('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{session('message')}}</li>
                    </ul>
                </div>
            @endif
            <form action="{{ route('change.pass') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">@lang('Текущий пароль')</label>
                    <input type="password" name="current_pass" class="form-control" required>
                    @error('current_pass')
                        <span class="invalid-feedback" style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password" class="">{{ __('Новый пароль') }}</label>
                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
                    @error('new_password')
                        <span class="invalid-feedback" style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new-password-confirm" class="">{{ __('Подтвердить новый пароль') }}</label>
                    <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                    @error('new_password_confirmation')
                        <span class="invalid-feedback" style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="pull-right btn btn-primary"> @lang('Сохранить') </button>
                </div>
            </form>
        </div>
    </div>
@endsection
