<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table id="analysis">
                <tbody>
                    @foreach($analysis as $item)
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#modal-primary{{ $item->id }}">{{ $item->title }}</a></td>
                            <td><a target="_blank" href="/storage/{{ $item->image }}" ><span><i class="fas fa-file-pdf"></i></span> Файл</a> </td>
                        </tr>

                        <div class="modal fade" id="modal-primary{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Описание</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{!! $item->desc !!}  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
{{--            <div class="compliance_create">--}}
{{--                @foreach($analysis as $item)--}}
{{--                    <div role="tab" id="heading{{ $item->id }}" class="panel-heading">--}}
{{--                        <h4 class="panel-title">--}}
{{--                            <a href=""></a>--}}
{{--                            <a  style="padding: 15px 30px" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-0" aria-expanded="false" aria-controls="collapseOne" class="collapsed">{{ $item->title  . ' '  . date('d-m-Y', strtotime($item->created_at))}}</a>--}}
{{--                        </h4>--}}
{{--                        <div id="collapse-0" role="tabpanel" aria-labelledby="heading{{ $item->id }}" class="panel-collapse active collapse" aria-expanded="true">--}}
{{--                            <div class="panel">--}}
{{--                                {!! $item->desc !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<style type="text/css">
    #analysis{
        width: 100%;
        margin: 15px 0;
    }
    #analysis tbody td{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    #analysis tbody td:first-child{
        padding-left: 15px !important;
    }
    #analysis tbody td:last-child{
        padding-right: 15px !important;
        text-align: right;
    }
    #analysis tbody td:last-child a{
        color: black;
    }
    #analysis tbody td:last-child a span{
        color: red;
    }
</style>
