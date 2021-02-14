
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <table class="summary-table">
                <tbody>
                    <tr style="display: none"><input id="company_id" type="hidden" name="company_id" value="{{ $comp->id }}"></tr>
                    <tr>
                        <td>@lang('Цена закрытия')</td>
                        <td>
                            {{ isset($comp->data->last_price) ?  $comp->data->last_price  : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Дневной диапозон')</td>
                        <td>
                            {{ isset($comp->min->last_price) ? 'min '.$comp->min->last_price : 'min' }}
                            {{ isset($comp->max->last_price) ? 'max '.$comp->max->last_price : 'max' }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('52 недельный диапозон')</td>
                        <td>
                            {{ $min_week ? 'min '.$min_week : 'min' }}
                            -
                            {{ $max_week ? 'max '.$max_week : 'max' }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('52 недельный Объём')</td>
                        <td>
                            {{ $volume ? $volume : '-'}}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Простые акции')</td>
                        <td>
                            {{ $comp->details->common_stocks }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Привилегированные акции')</td>
                        <td>
                            {{ isset($comp->details->preference) ? $comp->details->preference : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Рыночная капитализация')</td>
                        <td>{{ $market }}</td>
                    </tr>
                    <tr>
                        <td>@lang('Изменения за месяц') %</td>
                        <td>
                            <span style="@if($change_month > 0)color: #39b839;@else color: red; @endif">{{ $change_month  }} %</span>
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Изменения за год') %</td>
                        <td>
                            <span style="@if($change_year > 0)color: #39b839;@else color: red; @endif">{{ $change_year  }} %</span>
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('В случае капитализации')</td>
                        @if(isset(Auth::user()->id))
                            <td>{{ $comp->details->capitalization }}</td>
                        @else
                            <td class="block">
                                <span class="info-text">@lang('Необходимо войти, как клиент')</span>
                                <span style="color: #0151D3;"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td>P/E</td>
                        <td>{{ $comp->details->p_e }}</td>
                    </tr>
                    <tr>
                        <td>P/B</td>
                        <td>{{ $comp->details->p_b }}</td>
                    </tr>
                    <tr>
                        <td>@lang('Номинальная стоимость')</td>
                        <td>{{ $comp->details->face }}</td>
                    </tr>
                    <tr>
                        <td><a data-toggle="modal" data-target="#modal-sum" style="display: block;" href="#">@lang('Дивиденды')</a> </td>
                        <td><a data-toggle="modal" data-target="#modal-sum" style="display: block;" href=""><span><i class="fas fa-plus"></i></span> </a></td>
                    </tr>

                </tbody>
            </table>
            <div class="modal fade" id="modal-sum">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #0151D3;    color: white;">
                            <h4 class="modal-title">@lang('Дивидендная история')</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="dividend-table" id="dividend-table">
                                <thead>
                                    <tr>
                                        <th>@lang('Год')</th>
                                        <th>@lang('Сумма') (UZS)</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dividends as $div)
                                        <tr>
                                            <td>{{ $div->year }}</td>
                                            <td>{{ $div->sum }}</td>
                                            <td>{{ $div->procent }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div id="graph"></div>
        </div>
        <input type="hidden" id="preference" name="preference" @if($pref > 0) value="1" @else value="0" @endif>

        @if($pref > 0)
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div id="graph_2"></div>
            </div>
        @endif
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(count($comp->bonds) > 0)
                <h3>@lang('Облигации')</h3>
                <table class="table-bonds">
                    <thead>
                        <tr>
                            <th colspan="2">@lang('Название')</th>
                            <th>@lang('Ставка')</th>
                            <th>@lang('Дата / Cрок погошения')</th>
                            <th>@lang('Цена')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comp->bonds as $item)
                        <tr>
                            <td><img src="/storage/{{ $item->image }}" alt=""></td>
                            <td><span>{{ $item->title }}</span> <br>{{ $item->issuer }}</td>
                            <td>{{ $item->percent }} %</td>
                            <td><span>{{ $item->date_in }}</span> <br> {{ $item->date_out . ' ' . __('мес.')}}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
            @endif
        </div>
    </div>
</div>

<style>
    .table-bonds thead tr:first-child{
        font-weight: bold;
    }
    .table-bonds thead tr:not(first-child){
        background: #0056b3;
        color: white;
    }
    .dividend-table{
        width: 100%;
    }
    .dividend-table tr td:not(:first-child), .dividend-table tr th:not(:first-child){
        text-align: right;
    }
    .summary-table{
        margin-left: 20px;
    }
    .summary-table tr{
        border-bottom: 1px solid #e2e5ea;
    }
    .summary-table tr td{
        font-size: 15px;
        font-weight: bold;
        color: #003b7b;
    }
    .summary-table tr td:not(:first-child){
        font-weight: bold;
        text-align: right;
        padding: 5px 0 3px 15px;
    }
    .summary-table .block{
        position: relative;
    }
    .summary-table .block:hover .info-text{
        display: inline;
        position: absolute;
        top: -20px;
        left: 5px;
        background-color: #0151D3;
        color: white;
        border-radius: 10px;
        padding: 5px 8px;
        text-align: center;
        width: 200%;
    }
    .summary-table .block .info-text{
        display: none;
    }

    #graph,#graph_2 {
        width: 100%;
        height: 80%;
        max-width: 100%;
    }

    #controls {
        overflow: hidden;
        padding-bottom: 3px;
    }
    #controls .amcharts-range-selector-range-wrapper{
        display: none;
    }

    .table-bonds{
        width: 100%;
        margin-bottom: 5%;
    }
    .table-bonds thead tr th{
        padding: 10px 0px 10px 10px;
        border-bottom: 1px solid #efefef;
        font-size: 14px;
    }
    .table-bonds thead tr th:first-child{
        text-align: left;
        padding-left: 10px;
    }
    .table-bonds thead tr th:not(first-child){
        padding-right: 10px;
    }
    .table-bonds tr td, .table-bonds thead tr th{
        text-align: right;
    }
    .table-bonds tr td:first-child{
        text-align: left;
        width: 1%;
    }
    .table-bonds tbody tr:hover {
        background: #efefef;
    }
    .table-bonds tbody tr td:nth-child(2){
        text-align: left;
    }
    .table-bonds tbody tr td:last-child{
        padding-right:10px;
    }
    .table-bonds tbody tr td{
        padding-top: 10px;
        padding-bottom: 10px;
        /*cursor: pointer;*/
        font-weight:bold;
    }
    .table-bonds tbody tr td span{
        font-weight: bold;
    }
    .table-bonds tbody tr td img {
        width: 45px;
        height: 45px;
        object-fit: contain;
        border-radius: 50px;
    }

</style>
@push('main-chart')
    <script type="text/javascript" src="{{asset('front/js/highchart/highstock.js')}}"></script>
@endpush
<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN =  $('meta[name=csrf-token]').attr('content');

        var id = $('#company_id').val();
        var preference = $('#preference').val();
        function chart(data, volume, chart) {
            let t = '';
            if (chart == 'graph'){
                t = 'Common';
            }else {
                t = 'Preference';
            }
            // create the chart
            // Highcharts.setOptions({
            //     // global: {
            //     //     useUTC: false
            //     // },
            //     time: {
            //         timezone: 'Asia/Tashkent'
            //
            //     }
            // });
            Highcharts.stockChart(chart, {
                // time: {
                //     timezone: 'Asia/Tashkent'
                //
                // },
                title: {
                    text: t,
                },
                navigation: {
                    buttonOptions: {
                        enabled: false
                    }
                },
                credits: {
                    enabled: false
                },
                rangeSelector: {
                    labelStyle: {
                        display: 'none'
                    },
                    buttonTheme: { // styles for the buttons
                        fill: 'none',
                        stroke: 'none',
                        'stroke-width': 0,
                        r: 8,
                        style: {
                            color: '#039',
                            fontWeight: 'bold'
                        },
                        states: {
                            hover: {
                            },
                            select: {
                                fill: '#039',
                                style: {
                                    color: 'white'
                                }
                            }
                            // disabled: { ... }
                        }
                    },
                    allButtonsEnabled: true,
                    buttons: [{
                        type: 'day',
                        count: 1,
                        text: '1d'
                    }, {
                        type: 'month',
                        count: 1,
                        text: '1m'
                    }, {
                        type: 'year',
                        count: 1,
                        text: '1y'
                    }],
                    selected: 0,
                    inputEnabled: false
                },
                yAxis: [
                    {
                        labels: { align: 'left'},
                        height: '80%',
                        resize: { enabled: true }
                    },
                    {
                        labels: { align: 'left' },
                        top: '80%',
                        height: '20%',
                        offset: 0
                    }],
                xAxis:[
                    {
                        dateTimeLabelFormats: {
                            day: '%Y-%m-%d',
                            month: '%Y-%m',
                            year: '%Y'
                        },
                        type: 'datetime',
                        labels: {
                            formatter: function () {
                                // return  time(this.value) ;
                                return  Highcharts.dateFormat(" %d-%m-%Y", this.value);
                            }
                        }
                    },
                    {
                        dateTimeLabelFormats: {
                            day: '%Y-%m-%d',
                            month: '%Y-%m',
                            year: '%Y'
                        },
                        type: 'datetime',
                        labels: {
                            rotation: -90,
                            formatter: function () {
                                // return  time(this.value) ;
                                return  Highcharts.dateFormat(" %d-%m-%Y", this.value);
                            }
                        }
                    },
                ],
                tooltip: {
                    // shape: 'square',
                    // headerShape: 'callout',
                    // borderWidth: 0,
                    // shadow: false,
                    positioner: function (width, height, point) {
                        var chart = this.chart,
                            position;

                        if (point.isHeader) {
                            position = {
                                x: Math.max(
                                    // Left side limit
                                    chart.plotLeft,
                                    Math.min(
                                        point.plotX + chart.plotLeft - width / 2,
                                        // Right side limit
                                        chart.chartWidth - width - chart.marginRight
                                    )
                                ),
                                y: point.plotY
                            };
                        } else {
                            position = {
                                x: point.series.chart.plotLeft,
                                y: point.series.yAxis.top - chart.plotTop
                            };
                        }

                        return position;
                    }
                },
                series: [{
                    name: 'Цена',
                    type: 'area',
                    data: data
                }, {
                    name: 'Объём',
                    type: 'column',
                    data: volume,
                    yAxis: 1
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 800
                        },
                        chartOptions: {
                            rangeSelector: {
                                inputEnabled: false
                            }
                        }
                    }]
                }
            });

        };

        function getData(id) {
            $.ajax({
                type: 'POST',
                url: '/market-data/market-company-json/'+id,
                dataType: 'JSON',
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    // work = data;
                    console.log(data);
                    // console.log(data.volume);
                }
            }).done(function (data) {
                const common = data.market;
                const volume = data.volume;
                const map1 = common.map(x => [(x[0] + 18000)* 1000 , x[1]]);
                const map2 = volume.map(x => [(x[0] + 18000)* 1000 , x[1]]);

                // chart(data.market, data.volume);
                chart(map1, map2, 'graph');
            });

        }

        function getDataPref(id) {
            $.ajax({
                type: 'POST',
                url: '/market-data/market-company-preference-json/'+id,
                dataType: 'JSON',
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    // work = data;
                    // console.log(data.market);
                    // console.log(data.volume);
                }
            }).done(function (data) {
                // console.log(data);
                const pref = data.market;
                const volume = data.volume;
                const map1 = pref.map(x => [(x[0] + 18000)* 1000 , x[1]]);
                const map2 = volume.map(x => [(x[0] + 18000)* 1000 , x[1]]);

                // chart(data.market, data.volume);
                chart(map1, map2, 'graph_2');
            });

        }

        getData(id);

        if(preference == true){
            getDataPref(id);
        }

    })

</script>
