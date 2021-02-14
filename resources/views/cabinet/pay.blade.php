{{--@extends('cabinet.app')--}}

{{--@section('content')--}}

{{--<div class="col-lg-9">--}}
{{--<div class="user-detail">--}}
{{--<ul class="new-row-table">--}}
{{--<li>@lang('Пополнение счёта')</li>--}}
{{--</ul>--}}
{{--<form action="{{ route('refill') }}"  method="post">--}}
{{--@csrf--}}
{{--<input class="form-control" name="amount" type="text">--}}
{{--<input type="hidden" name="merchant" value="597b33e0db0c690e08708d37">--}}
{{--<input type="text" name="phone">--}}
{{--<input type="hidden" name="kzl" value="{{ Auth::user()->name }}">--}}
{{--<input type="hidden" name="callback" value="{{ route('refill-test') }}">--}}
{{--<button type="submit" class="click_logo">Оплатить с помощью <b>Payme</b></button>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--<script type="text/javascript">--}}

{{--$(function() {--}}
{{--// });--}}
{{--console.log('yes');--}}
{{--$(".click_logo").click();--}}
{{--});--}}
{{--</script>--}}
{{--@endsection--}}
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
            {{--<ul class="new-row-table">--}}
                {{--<li>@lang('Пополнение счёта')</li>--}}
            {{--</ul>--}}
            <h4>@lang('Пополнение счёта')</h4>
            <form action="https://checkout.paycom.uz" id="fuckinform" method="post">
                @csrf
                <div class="form-group">
                    <label for="amountn">@lang('Введите сумму')</label>
                    <input required class="form-control" id="amountn" name="amount" type="number">
                </div>
                <input type="hidden" name="merchant" value="597b33e0db0c690e08708d37">
                <input type="hidden" name="account[custumer_id]" value="{{auth()->user()->name}}">
                <input type="hidden" name="account[customer_name]" value="{{auth()->user()->surname . ' ' . auth()->user()->first_name . ' ' . auth()->user()->lastname }}">
                <input type="hidden" id="phonen" name="account[phone]" value="{{auth()->user()->phone}}">
                <input type="hidden" id="order_id" name="account[order_id]">
                <input id="deletethistoo" type="hidden" name="callback" value="{{ route('refill-test') }}">
                <div style="position: relative;">
                    <button  type="button" id="clickthis" class="click_logo pay-but"></button>
                    <span style=" position: absolute; top: 30px;">
                        @switch(App::getLocale())
                            @case('ru')
                                @lang('Оплатить с помощью') <b>Payme</b>

                            @break
                            @case('en')
                                Pay by <b>Payme</b>
                            @break
                            @case('uz')
                            <b>Payme</b> orqali to'lang
                            @break
                        @endswitch
                    </span>
                </div>
            </form>
            {{--<button>--}}
                {{--<span class="pay-but"></span>--}}
            {{--</button>--}}
        </div>
    </div>
    <style type="text/css">
        .pay-but{
            width: 80px;
            border: none;
            background: none;
            height: 80px;
            background-image: url("data:image/svg+xml,%3Csvg id='Layer_1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cstyle%3E.st0%7Bfill:%23f25479%7D.st1%7Bfill:%23333%7D.st2%7Bfill:%23fff%7D.st3%7Bfill:%23ffb800%7D.st4%7Bfill:%23fc0%7D.st5%7Bfill:%23f7ad00%7D.st6%7Bfill-rule:evenodd;clip-rule:evenodd;fill:%23fff%7D.st7%7Bfill:%23f4bcd6%7D.st8%7Bfill:%23fdeef5%7D.st9%7Bfill:%233cc%7D%3C/style%3E%3Cpath class='st9' d='M81.8 64.1c.9 1.4 1 3.5 0 5.1-.9 1.5-6.3 7.1-8 8.9-1.5 1.6-3.6 3.2-5.6 3.2h-42c-5.7 0-6-1.9-6-6.3V57.4c0-4.4 1.3-5.7 5.2-5.7h42.9c2 0 3.8 1 5.9 3.1 1.7 1.7 6.9 8.2 7.6 9.3z'/%3E%3Cpath class='st2' d='M29.7 58.5v-.1c0-.6 0-1.1-1-1.1h-3.5c-.8 0-.9.5-.9 1.2V63c1.7-2.4 3.6-3.6 5.4-4.5zM53.3 75.3V63.8c0-4.7-2.1-7.1-6.2-7.1-1.2 0-2.3.3-3.3.9-1 .6-1.9 1.4-2.8 2.5-.4-1.2-1.1-2-2-2.6s-2.1-.8-3.5-.8c-1.7 0-3.6.6-5 1.7-.3.3-6.1 4.9-6.1 9.6V75.2c0 .2-.1 1.1.9 1.1H29c1.1 0 1-.7 1-1V63.6c.6-.8 1.9-2.8 3.9-2.8.8 0 1.4.3 1.7.8.3.5.5 1.4.5 2.7v11c0 .2-.1 1.1.9 1.1h3.6c1.1 0 1-.7 1-1V63.7c.7-.8 2-2.8 3.9-2.8.8 0 1.4.3 1.7.8.4.5.5 1.4.5 2.7v11c0 .2-.1 1.1.9 1.1h3.7c1.1-.1 1-.9 1-1.2z'/%3E%3Cg%3E%3Cpath class='st2' d='M73.5 70.7c-1.3 3.5-4.4 5.4-8.3 5.4-5.6 0-9.3-3.8-9.3-9.5 0-5.6 3.8-9.7 9.1-9.7 5.2 0 8.7 3.6 9 9.5 0 .7-.2 1.4-1.1 1.4H61c.1 3.1 1.6 4.8 4.3 4.8 1.6 0 2.6-.7 3.4-2.1.3-.5 1.1-.5 1.1-.5h3.1c.4 0 .6.5.6.7zM65 60.6c-2.2 0-3.8 1.6-4.1 4.1h8c-.2-2.3-1.4-4.1-3.9-4.1z'/%3E%3C/g%3E%3Cpath class='st1' d='M41.5 20.4c-.5-.8-1.1-1.4-1.7-1.8-.7-.5-1.4-.8-2.3-1.1-.8-.3-1.8-.5-2.7-.6-1-.1-2.1-.2-3.2-.2h-9.4c-.8 0-1.7.6-1.7 1.6v15.2c1.2 2.5 3.5 5.2 6.2 6.5v-3c0-1.6 1.2-1.9 1.7-1.9h2.8c3.8 0 6.8-.8 8.8-2.4 2-1.6 3-4 3-7.1 0-1-.1-1.9-.3-2.7-.4-1-.7-1.8-1.2-2.5zM36 28.2c-.3.6-.8 1-1.4 1.3-.6.3-1.3.5-2 .5-.8.1-1.5.1-2.4.1h-2.6c-.6 0-1.1-.5-1.1-1.3v-6.2c0-.7.5-1 1-1h2.7c.9 0 1.7 0 2.5.1s1.4.2 2 .5c.6.3 1 .7 1.3 1.2.3.6.5 1.3.5 2.4 0 1-.1 1.8-.5 2.4zM26.6 41c-2.9-1.2-4.8-2.5-6.2-3.9v7.3s-.1 1.2 1.1 1.2h4.1c1.1 0 1-1.2 1-1.2V41zm58.2-16.3h-3.7c-.7 0-1.2.3-1.5 1.1-.3.8-4.2 11.7-4.2 11.7s-3.7-10.6-4-11.4c-.3-.8-.8-1.4-1.6-1.4h-3.4c-1.2 0-1.2.9-1 1.3.1.3 4.8 13 6.5 17.8.4 1.1.6 1.5.6 1.9 0 .4-.4 1.3-.7 1.8-.1.3-.3.5-.5.7 3.5-1 7.5-4.8 9.5-8.8 2-5.7 4.7-13.1 4.8-13.5.1-.7.1-1.2-.8-1.2zM68.5 49.2c-.3 0-.6 0-1-.1s-1.1 0-1.1.7v2.8c0 1.1.5 1.2.8 1.2.8.2 1.6.3 2.6.3 1.2 0 2.2-.2 3-.6.9-.4 1.6-1 2.3-1.8.7-.8 1.2-1.6 1.8-2.7.5-1 1-2.2 1.5-3.4l.5-1.5c-1 1-5.8 5.6-10.4 5.1zM62.9 28c-.2-.5-.5-.9-.8-1.3-.3-.4-.7-.7-1.1-1-.5-.3-1-.6-1.4-.7-.5-.2-1-.4-1.6-.5-.6-.1-1.2-.2-1.9-.3-.7-.1-1.4-.1-2.3-.1-5.6 0-8.8 1.8-9.5 5.3-.3 1.1.8 1.2.8 1.2h3.4c.9 0 .9-.3 1.3-1.1.2-.4.4-.8.8-1.1.7-.5 1.6-.8 3-.8 1.3 0 2.2.2 2.8.7.6.5.9 1.2 1 2.2 0 1.2-.4 1.9-1.8 1.9-3.4-.1-7.1.3-9.2 1.4-2.1 1.2-3.2 3.5-3.2 6 0 1 .2 1.9.5 2.7.4.8.9 1.4 1.5 1.9s1.4.9 2.3 1.2c.9.3 1.9.4 2.9.4 1.5 0 2.8-.2 3.9-.6 1.1-.4 2.9-1.6 3.1-1.8v.7c0 .6.2 1.2 1 1.2h4c.8 0 1-.6 1-1.3V31.9c0-.9-.1-1.6-.2-2.3.1-.5 0-1.1-.3-1.6zm-5.4 12.1s-1 2.1-4.7 2.1c-1 0-1.8-.2-2.5-.7-.6-.5-1-1.2-1-2.1 0-1.3.5-2.1 1.5-2.6s3.1-.8 4.6-.8c1.5 0 2 1 2 1.7.1.2.1 2.4.1 2.4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;

        }
    </style>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $(document).ready(function () {
                $(document).on('click', '#clickthis', function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    var data = $("#fuckinform").serializeArray();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('refill') }}',
                        data: {
                            "phone": $('#phonen').val(),
                            "amount": $('#amountn').val(),
                        },
                        success: function (response) {
                            console.log(response);
                            $(document).find('input[name="_token"]').remove();
                            $(document).find('#deletethis').remove();
                            $(document).find('#deletethistoo').remove();
                            $(document).find('#order_id').val(response);
                            // $(document).find('#travel').val(response);
                            $('#amountn').val($('#amountn').val() * 100)
                            $("#fuckinform").submit();
                        }
                    });
                })
            });
        });
    </script>
@endpush
