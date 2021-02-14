<section class="anch" id="team">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading" id="management-title">
                    <h1>@lang('Наша команда')</h1>
{{--                    <a href="{{ route('team.page') }}">@lang('Узнать подробнее')</a>--}}
                </div>
            </div>
            <div class="management">
                @foreach($team as $item)
                    <div class="item">
                        <div class="inner">
                            <img src="storage/{{ $item->photo }}">
                            <div class="info">
                                <div class="name">{{ $item->name }}<br>{{ $item->surname }}</div>
                                <div class="offcut"></div>
                                <p>{{ $item->position }}
{{--                                    <br>«Kapital Depozit»--}}
                                </p>
                            </div>
{{--                            <a href="#" data-toggle="modal" data-target="#modal-{{ $item->id }}" class="open-popup" tabindex="0"></a>--}}
                            <a href="#" class="open-popup" tabindex="0"></a>
                        </div>
                    </div>

                @endforeach
            </div>
{{--            <div class="mod-team">--}}
{{--                @foreach($team as $item)--}}
{{--                    <div class="modal  fade" style="background: #014fd338;" id="modal-{{$item->id}}">--}}
{{--                        <div class="modal-dialog">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <div class="head">--}}
{{--                                        <img class="ava" src="/storage/{{$item->photo}}" alt="">--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}
{{--                                    <h3 style="font-weight: bold;">{{ $item->surname  . ' ' . $item->name }} </h3>--}}
{{--                                    <h5 style="font-weight: bold;">{{ $item->position }} « Kapital Depozit » </h5>--}}
{{--                                    <p> {!! strip_tags($item->description)  !!} </p>--}}
{{--                                    <ul class="team-list">--}}
{{--                                        <li><span>@lang('Контакты')</span></li>--}}
{{--                                        <li><span>e-mail:</span> {{ $item->email }}</li>--}}
{{--                                        <li><span>@lang('Телефон'):</span> {{ $item->phone_one. '; ' }} {{ $item->phone_two ?  $item->phone_two . ';': '' }}</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="modal-footer">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                @endforeach--}}

{{--            </div>--}}
        </div>
    </div>
</section>
<style type="text/css">
    @media (min-width: 1400px){
        .mod-team .modal-header .head{
            height: 560px !important;
        }
        .mod-team .modal-body{
            height: 250px !important;
        }
        #team .modal.show .modal-dialog{
            max-width: 37%!important;
        }
    }
    #management-title h1{
        font-weight: bold;
        text-transform: uppercase;
    }
    .management .info{
        background: linear-gradient(90deg, rgba(0,51,135,1) 0%, rgba(0,51,135,0) 100%);
        left: 0!important;
        bottom: 15px!important;
        width: 100%!important;
    }
    main .inner .info .name {
        padding: 10px 15px;
        margin: 0!important;
        font-size: 20px!important;
    }
    main .inner .info p{
        padding: 0 15px;
    }
    main .inner .offcut{
        margin-left: 15px;
        margin-bottom: 10px!important;
        height: 2px!important;
        width: 80% !important;
        background: linear-gradient(90deg, rgb(255 255 255) 0%, rgba(0,51,135,0) 100%) !important;
    }


    .mod-team .modal-header{
        padding: 0;
    }
    .mod-team .modal-header .head {
        width: 100%;
        overflow: hidden;
        height: 400px;
        position: relative;
    }
    .mod-team .modal-header button{
        /*display: none;*/
        position: absolute;
        top: 4%;
        right: 4%;
        font-size: 30px;
    }
    .mod-team .modal-header img{
        width: 100%;
        object-fit: cover;
    }
    .mod-team .modal-body{
        overflow-y: scroll;
        height: 150px;
    }

    .mod-team .modal-body .team-list {
        padding: 0;
        list-style: none;
    }
    .mod-team .modal-body .team-list span{
        font-weight: bold;
    }
</style>
