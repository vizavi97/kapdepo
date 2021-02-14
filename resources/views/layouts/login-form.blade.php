<div class="modal fade" id="request-call1" tabindex="-1" role="dialog" aria-labelledby="request-call1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Вход в личный кабинет')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
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

                </div>
                <div class="modal-footer">
                    <div class="human-type">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember" id="test" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="test">
                                {{ __('Запомнить') }}
                            </label>
                            {{--<input type="checkbox" id="phyisic" name="">--}}
                            {{--<label for="phyisic">Запомнить логин</label>--}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('Войти')</button>
                </div>
            </form>
        </div>
    </div>
</div>
