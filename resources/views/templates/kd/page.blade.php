@extends('layouts.app')
@section('main_head')
    <section class="banner-section">
        <div class="banner-page-new">
            <div class="item">
                <div class="bg_header" style="background: url({{ asset('front/bonds.jpg') }}) no-repeat; background-size: cover; background-position: center;"></div>
                <div class="item-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-wrapper__section">
                                   <span class="title-span">KD - Ideas</span>
                                    <span class="bor"></span>

                                </div>
                                <h1> <br> </h1>
                                <div class="new-block-text">
                                    <p>    <br> </p>
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
                <h2>KD Ideas</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h4 class="sub-t">KD-Index <a href="{{ route('kd.index') }}">@lang('перейти на страницу')</a></h4>

                <div class="chart-block">
                    <div id="speedChart" width="600" height="400"></div>
                </div>
            </div>
            <div class="col-md-7">
                <h4 class="sub-t" id="analytics">KD-Analytics</h4>
                @foreach($analytics as $item)
                    <div class="block-analytic">
                        <a href="#" class="obj-item" data-toggle="modal" data-target="#modal-{{ $item->id }}">
                            <img class="ava" src="/storage/{{$item->ava}}" alt="">
                            <p><span>{{ $item->name }}</span> {{ date('d-m-Y', strtotime($item->created_at)) }}</p>
                            <p class="title-item">{{ $item->title }}</p>
                        </a>

                    </div>
                    <div class="modal analytics fade" id="modal-{{$item->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">                                <img class="ava" src="/storage/{{$item->ava}}" alt="">
                                        Ivanov Ivanov</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="font-weight: bold;">{{ $item->title }} <span>{{ date('d-m-Y', strtotime($item->created_at)) }}</span></p>
                                    <p>{!! $item->body !!}</p>
                                </div>
                                <div class="modal-footer">
                                    <p class="block-file">
                                        <a target="_blank" href="/storage/{{ $item->file }}" ><span><i class="fas fa-file-pdf"></i></span> Файл</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <style type="text/css">
        .sub-t{
            text-align: center;
            font-weight: bold;
        }
        .sub-t a{
            font-size: 15px;
            padding: 5px;
            border: 2px solid;
            margin-left: 10px;
            margin-right: 0px;
            border-radius: 25px;
        }
        .sub-t a:hover{
            color: white;
            background: #0151D3;
            border: 2px solid #0151D3;
        }
        .block-analytic .obj-item{
            color: black;
        }
        .block-analytic .obj-item p span{
            color:#0151D3 ;
        }
        .block-analytic .obj-item  .title-item{
            font-weight: bold;
        }
        .block-analytic {
            display: inline-block;
            width: 100%;
            margin-bottom: 20px;
            /*margin-top: 5px;*/
        }
        .block-analytic .ava {
            width: 70px;
            object-fit: cover;
            float: left;
            margin-right: 10px;
            border-radius: 40px;
        }
        .block-analytic p{
            margin: 0;
            font-size: 15px;
        }
        .block-analytic p span{
            font-weight: bold;
            font-size: 14px;
        }
        .modal .ava{
            width: 75px;
            border-radius: 40px;
            object-fit: cover;
            margin-right: 10px;
        }
        .modal .block-file a{
            color: black;
            font-weight: bold;
        }
        .modal .block-file a:hover{
            color: #0b4e96;
        }
        .modal .block-file span{
            color: red;
        }


    </style>
    @push('main-chart')
        <script type="text/javascript" src="{{asset('front/js/highchart/highcharts.js')}}"></script>
    @endpush
    <script type="text/javascript">

        $(document).ready(function () {

            $('.analytics').modal(
                {
                    modal : false ,
                    show : false ,
                    height : 300,
                    width : 400,
                }
            );

            var CSRF_TOKEN =  $('meta[name=csrf-token]').attr('content');
            var labels;
            var vals;
            var int = { _token: CSRF_TOKEN , year: $('#year').val() ?  $('#year').val() : 0 }



            function time(value){
                const timezone = new Date(value);
                console.log(timezone.getMonth());
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
                    chart(data);

                });
            }
            getData();
        });
    </script>
@endsection
