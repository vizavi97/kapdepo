@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/kd-index-new.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                    <span class="title-span" >KD - Index</span>
                                    <span class="bor"></span>

                                </div>
                                <h1>
{{--                                    Корпоративным и институциональным клиентам--}}
                                    <br>
                                </h1>
                                <div class="new-block-text">
                                    <p>
                                        <br>
{{--                                        Независимая инвестиционная компания, предоставляющая полный<br>комплекс инвестиционно-банковских услуг--}}
                                    </p>
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
@section('breadcrumb')
    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>KD Index</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>
                        <a href="{{ route('kd.page') }}">@lang('Kd-Ideas')</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="info-block">
                    @switch(App::getLocale())
                        @case('ru')
                            <p><strong>KD index</strong> — фондовый индекс Узбекистана, в корзину которого включены 10 избранных, ликвидных акций, имеющих наиболее развивающийся потенциал. Список принадлежит компании “KAP DEPO” и ею же составляется. Расчет индекса начался с ноября 2020 года.
                            </p>
                            <p>
                                В этот список попали: АО «Кизилкумцемент», АО «КВАРЦ», АО «УзРТСБ», “Узметкомбинат”, АО «Узвторцветмет», АО «Toshkentvino», АО «Кувасайцемент», АКБ «Hamkorbank», ЧАБ «Trastbank», АКБ «Узпромстройбанк». Список не исчерпывающий и со временем может расширяться. Исходя из предъявляемых критериев, компании, включенные в индекс, должны быть растущими Компаниями узбекского рынка.                            </p>
                            <p>
                                Значение индекса KD index отражает их суммарную free-float деленный на 10000 (условное базисное значение). Так как вес каждой компании в индексе пропорционален её «условной» free-float, индекс является взвешенным по free-float.
                            </p>
                            <p>
                                Компания KAP DEPO может создать для клиентов индексный инвестиционный портфель растущих компаний.
                            </p>
                        @break
                        @case('uz')
                            <p>
                                <strong>KD indeksi </strong> - O'zbekiston fond indeksi. Uning tarkibiga 10 ta eng yuqori o'sish potentsialga ega bo'lgan likvid aktsiyalar kiritilgan. Ro'yxat KAP DEPO tomonidan tuzilgan va unga tegishli. Indeks 2020 yil noyabridan boshlab hisoblanmoqda.
                            </p>
                            <p>
                                Ushbu ro'yxatdagilar: "Qizilqumsement" AJ, "O'zmetkombinat" AJ, "O'zRTXB" AJ, "Toshkentvino" AJ, "Kvarts" AJ, "Quvasoysement" AJ, "O'zikkilamchiranglimetall" AJ, "Hamkorbank" ATB, "Trastbank" XATB, "Sanoatqurilish" ATB.
                            </p>
                            <p>
                                Ro'yxat to'liq emas va vaqt o'tishi bilan kengayishi mumkin. KAP DEPO Kompaniyasi ichki mezonlariga asosan, indeksga kiritiladigan kompaniyalar, O'zbekiston bozorining o'sayotgan kompaniyalari bo'lishi kerak.
                            </p>
                            <p>
                                KD indeks qiymati, indeksga kiritilgan kompaniyalarrning umumiy free-float ko'rsatkichining 10 000ga bo'lingan holatini aks ettiradi. Indeksdagi har bir kompaniyaning qiymati uning free-float (shartli) bilan mutanosib bo'lgani uchun, indeks free-float bo'yicha tortilgan.
                            </p>
                            <p>
                                KAP DEPO kompaniyasi mijozlari uchun o'suvchi kompaniyalarning indeksli investitsion portfelini tuzib berishi mumkin.
                            </p>
                        @break
                        @case('en')
                        <p>
                            <strong>KD index</strong>is - stock market index of Uzbekistan, which includes 10 selected, liquid and publicly traded stocks with the most developing potential on the stock exchange of Uzbekistan. List belongs to and is compiled by KAP DEPO. Сalculation of index began in November 2020.

                        </p>
                        <p>
                            List of KD index companies: "Kizilkumcement", "QUARTZ", "UzRTSB", "Uzmetkombinat", " Uzvtortsvetmet", " Toshkentvino", "Kuvasaytsement", "Hamkorbank", "Trastbank", "Uzpromstroybank". The list is not exhaustive and may expand over time. Based on criteria presented, the companies included in index should be growing Companies of Uzbek market.                        </p>
                        <p>
                            Value of KD index reflects total free-float divided by 10000 (conditional base value). Since the weight of each company in the index is proportional to its "conditional" free-float, the index is weighted by free-float.
                        </p>
                        <p>
                            KAP DEPO can create an index investment portfolio of growing companies of Uzbekistan.
                        </p>
                        @break
                    @endswitch
                </div>

            </div>
            <div class="col-md-12" >
                <nav class="market-nav">
                    <ul>
                        <li><a class="{{ request()->has('year') ? '' : 'active' }}" href="{{ route('kd.index') }}"><span>@lang('1 month')</span></a></li>
                        <li><a class="{{ request()->has('year') ? 'active' : '' }}" href="{{ route('kd.index', 'year=1') }}"><span>@lang('1 year')</span></a></li>
                    </ul>
                    @if(request()->has('year'))
                        <input type="hidden" id="year" value="1">
                    @endif
                </nav>
                <p class="period">@lang('Period'): <span>{{ date("d-m-Y",mktime(0,0,0,date('m')-1, date('d'), date('Y'))) }}</span> - <span>{{ date('d.m.Y') }}</span></p>
            </div>
            <div class="col-md-12">

                <div id="speedChart" width="600" height="400"></div>
            </div>
        </div>
    </div>
    @push('main-chart')
        <script type="text/javascript" src="{{asset('front/js/highchart/highcharts.js')}}"></script>
    @endpush

    <script type="text/javascript">

        $(document).ready(function () {
            var CSRF_TOKEN =  $('meta[name=csrf-token]').attr('content');
            var labels;
            var vals;
            var int = { _token: CSRF_TOKEN , year: $('#year').val() ?  $('#year').val() : 0 }



            function time(value){
                const timezone = new Date(value);
                // console.log(timezone.getMonth());
                return timezone.getDate() + '-' + timezone.getMonth() + '-' + timezone.getFullYear();
            }


            function chart(data){
                $('#speedChart').highcharts({
                    title: null,
                    chart: {
                        type: 'line'
                    },

                    credits: {
                        enabled: false
                    },
                    navigation: {
                        buttonOptions: {
                            enabled: false
                        }
                    },

                    xAxis: {
                        type: 'datetime',
                        labels: {
                            rotation: -90,
                            formatter: function () {
                                // return  time(this.value) ;
                                return  Highcharts.dateFormat(" %d-%m-%Y", this.value);
                            }
                        }
                    },

                    tooltip: {
                        shared: true,
                        useHTML: true,
                        headerFormat: '<table>',
                        pointFormat: '<tr><td style="color: {series.color}">{series.name}: </td>' +
                            '<td style="text-align: right"><b>{point.y}</b></td> </tr>',
                        footerFormat: '</table>',
                        // xDateFormat: '%Y-%m-%d',
                        formatter: function()
                        {
                            var s = '<b>'+Highcharts.dateFormat('%a, %d-%m-%Y', this.x)+'</b>';
                            $.each(this.points, function(i, point)
                            {
                                s += '<br/><span style="color:'+point.series.color+'">'+ point.series.name +'</span>: '+point.y;
                            });
                            return s;
                        },
                        valueDecimals: 3,


                    },
                    yAxis: {
                        title:null,
                        labels: {
                            format: '{value:.3f}'
                        }
                    },
                    series: [{
                        name: 'Index',
                        data: data
                    }]

                });
            }

            function getData(){
                $.ajax({
                    type: 'POST',
                    url: '/kd-ideas/get-index',
                    dataType: 'JSON',
                    data: int,
                    success: function (data) {
                        console.log(data);

                    }
                }).done(function (data) {
                    const test = data;
                    const map1 = test.map(x => [(x[0] + 18000)* 1000 , x[1]]);
                    chart(map1);

                });
            }
            getData();
        });
    </script>

    <style>
        .info-block p{
            text-indent: 2em;
        }
        .period{
            text-align: center;
        }
        .period span{
            font-weight: bold;
            padding: 0 10px;
        }
        .market-nav{
            padding: 0 20px;
        }
        .market-nav ul{
            border-bottom: 3px solid #e0e4e9;
            padding: 10px 0;
            text-align: center;
        }
        .market-nav ul li{
            display: inline-block;
        }
        /*.market-nav ul li a:hover{*/
        /*border-bottom: 3px solid #188fff;*/
        /*}*/
        .market-nav ul li a {
            padding: 12px 12px;
            font-weight: bold;
            color: #0151D3;
        }
        .market-nav .active{
            border-bottom: 3px solid #188fff;

        }
        .market-nav ul li a:hover{
            background-color: #e0f0ff;
        }
    </style>
@endsection


