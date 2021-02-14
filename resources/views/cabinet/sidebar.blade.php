<div class="col-lg-3">
    <div class="filter">
        <div class="name-user">
            <i class="fas fa-user-circle"></i>
            <span> {{ Auth::user()->first_name . ' ' . Auth::user()->surname  }}</span>
        </div>
        <ul>
            <li>
                <a href="{{ route('cabinet.home') }}" class="{{ $url == route('cabinet.home')? 'active' : ' ' }}">@lang('Личные данные')</a>
            </li>
            <li>
                <a href="{{ route('get.pnl') }}" >P&L</a>
            </li>
            <li>
                <a href="{{ route('refill') }}"  class="{{ $url == route('refill')? 'active' : ' ' }}">@lang('Пополнение счёта')</a>
            </li>
            <li>
                <a href="{{ route('change.pass') }}" class="{{ $url == route('change.pass')? 'active' : ' ' }}">@lang('Изменить пароль')</a>
            </li>

        </ul>
    </div>
</div>
