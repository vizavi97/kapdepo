<section class="anch" id="tariff" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading">
                    <h1>@lang('Тарифные планы')</h1>
                    <a class="download-link" target="_blank" style="font-weight: bold; background: #0151D3;
    color: white; border-bottom: none;border: 2px solid;padding: 5px 10px;border-radius: 25px;font-size: 14px;" href="{{ $settings->file }}">
                        @lang('Тарифы для юридических лиц')
                    </a>
                </div>
            </div>
            @foreach($tariff as $item)
                <div class="tar-block col-lg-3">
                    <div class="tar-block tile__inner" id="order-{{ $item->order }}">
                        <div class="border-after top"></div>
                        <div class="border-after left"></div>
                        <div class="border-after right"></div>
                        <div class="border-after bootom"></div>
                        <div href="#" class="rate-link">
{{--                            <div class="rate__icon"><i class="fab fa-telegram-plane"></i></div>--}}
                            <div class="rate__title">{{ $item->title }}</div>
                            <div class="rate__conditions">
                                <div class="rate__condition">
                                    <div class="bg_item-news">
                                        <span>@lang('от') {{ $item->commission }}%</span>
                                    </div>
{{--                                    <p>{{ $item->note }}</p>--}}
                                </div>
                            </div>
                            <div class="rate__description">
{{--                                <p>--}}
                                    {!! $item->desc !!}
{{--                                </p>--}}

                            </div>
                        </div>
                        <div class="foot-desc">
                            <div class="foot-info">
                                <h6>Комиссия за сделку:</h6>
                                {!! $item->note !!}
                            </div>
                            <a href="{{ route('open.account') }}" class="account">@lang('Открыть счет')</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <style type="text/css">
        .foot-desc{
            border-top: 1px solid;
        }
        #order-2  .foot-desc,
        #order-3  .foot-desc,
        #order-4  .foot-desc{
            border-top: 1px solid white;
            color: white;
        }
        .foot-desc{
            width: 100%;
            margin: 370px 20px 25px 20px;
        }
        .foot-desc .foot-info{
            padding: 15px 0;
        }
        .foot-desc .foot-info h6, .foot-desc .foot-info{
            text-align: left;
            font-weight: bold;
        }
        .foot-desc .foot-info p{
            margin: 0;
            font-size: 14px;
        }
        .foot-desc a {
            display: inline !important;
            margin: 30px 30px!important;
        }
        .rate__description ul{
            list-style: none;
            padding: 0;
        }
        /*@import url("https://use.fontawesome.com/releases/v5.8.1/css/all.css");*/

        .rate__description ul li:before{
            content: "\f00c";
            font-family: "Font Awesome 5 Free"; /* This is the correct font-family*/
            font-style: normal;
            /*font-weight: normal;*/
            color: #00bb0b;
            font-weight:900;
            padding-right: 10px;
            font-size:12px;
        }

        .rate__description ul li{
            font-weight: bold;
            font-size: 12px;
            text-align: left;
            /*text-indent: -5px;*/
            padding: 2px 0;
        }
        #order-1{
            background: rgb(255,255,255);
            background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(240,242,241,1) 85%);
        }
        #order-2{
            background: rgb(103,123,218);
            background: radial-gradient(circle, rgba(103,123,218,1) 0%, rgba(55,79,187,1) 85%);
        }
        #order-3{
            background: rgb(47,75,198);
            background: radial-gradient(circle, rgba(47,75,198,1) 0%, rgba(11,37,148,1) 85%);
        }
        #order-4{
            background: rgb(8,25,105);
            background: radial-gradient(circle, rgba(8,25,105,1) 0%, rgba(1,12,66,1) 85%);

        }
        main #order-4 .rate__title,
        main #order-3 .rate__title,
        main #order-2 .rate__title,
        main #order-4 ul li,
        main #order-3 ul li,
        main #order-2 ul li
        {
            color: white;
        }

        .download-link:hover{
            background: white !important;
            color: #0151D3 !important;
        }
        main .tile__inner {
            background-color: #fff;
        }
        .bg_item-news {
            font-weight: bold;
            display: block;
            width: fit-content;
            margin: 0 auto;
            background-color: #00bb0b;
            padding: 0 10px;
            line-height: 25px;
            border-radius: 10px;
            color: #fff;
        }
        main .tile__inner .account {
            border-radius: 100px;
            padding: 5px 15px!important;
            font-weight: bold;
            background: #003b9a;
            border: 1px solid #003b9a;
            position: relative;
            z-index: 11;
        }
        main  #order-3 .account,
        main  #order-4 .account{
            background: white;
            color: #003b9a;
        }
        main  #order-4 .account:hover,
        main  #order-3 .account:hover{
            background: #003b9a;
            color: white;
        }
        main .tile__inner .account:hover {
            background: white;
            color: #003b9a;
        }
        .border-after {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 15px;
            left: 15px;
        }
        .border-after::after {
            border: 1px solid #003b9a;
        }
        .border-after.top::after {
            top: -10px;
            left: -10px;
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
            left: -10px;
            right: 0;
            top: -10px;
            width: 100px;
        }
        .border-after.right::after {
            position: absolute;
            content: '';
            display: block;
            height: 1px;
            right: -10px;
            bottom: -10px;
            width: 120px;
        }
        .border-after.bootom::after {
            position: absolute;
            content: '';
            display: block;
            height: 250px;
            right: -10px;
            bottom: -10px;
        }
    </style>
</section>
