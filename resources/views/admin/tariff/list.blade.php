@extends('admin.home')
@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Тариф', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Тарифы</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Тарифы</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex p-2" style="background-color: rgba(0,0,0,.03);">
                            <h3 class="card-title m-0" style="line-height:36px;">Список </h3>
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('tariff.create') }}" class="btn btn-success">
                                        Добавить
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0" style="min-height: 200px;">
                                    <thead>
                                    <tr>
                                        <th># ID</th>
                                        <th>Название</th>
                                        <th>Порядок</th>
                                        <th>Публикация</th>
                                        <th style="text-align: center;">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tariffs as $item)
                                            <tr>
                                                <td>{{ $item->id }}.</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->order }}</td>
                                                <td>
                                                    @if($item->public == true)
                                                        <span class="badge badge-success">Опубликован</span>
                                                    @else
                                                        <span class="badge badge-warning">Не опубликован</span>
                                                    @endif
                                                </td>
                                                {{--<td>{{ $banner->lang }}</td>--}}
                                                <td style="width: 1%;">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                Изменить
                                                            </button>
                                                            <div class="dropdown-menu" style="padding: 0">
                                                                <a class="dropdown-item link-edit" href="{{ route('tariff.edit', ['id'=> $item->id]) }}">
                                                                    <span class="edit action"><i class="far fa-edit"></i></span>
                                                                    Изменить
                                                                </a>
                                                                <div class="dropdown-divider" style="margin: 0;"></div>
                                                                <a class="dropdown-item link-lang" href="{{ route('tariff.trans', ['id' => $item->id, 'lang' => 'en']) }}">
                                                                    <span class="lang action"><i class="fas fa-globe-asia"></i></span>Перевод eng
                                                                </a>
                                                                <a class="dropdown-item link-lang" href="{{ route('tariff.trans', ['id' => $item->id, 'lang' => 'uz']) }}">
                                                                    <span class="lang action"><i class="fas fa-globe-asia"></i></span>Перевод uzb
                                                                </a>
{{----}}
                                                                <div class="dropdown-divider" style="margin: 0;"></div>
                                                                <a class="dropdown-item link-delete" data-toggle="modal" data-target="#modal-danger{{ $item->id }}" href="#">
                                                                    <span class="trash action"><i class="fas fa-trash-alt"></i></span>
                                                                    Удалить
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- /btn-group -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-danger{{ $item->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-danger">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Вы уверены, что хотите удалить ? </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{  $item->title }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('tariff.delete', ['id' => $item->id]) }}" class="btn btn-outline-light">Удалить</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="card-tools">
                                {{--{{ $banners->links() }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
