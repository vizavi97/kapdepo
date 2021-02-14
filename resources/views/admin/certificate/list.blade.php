@extends('admin.home')
@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Сертификаты и Лицензии', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Сертификаты и Лицензии</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Сертификаты и Лицензии</li>
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
                                    <a href="{{ route('certificates.create') }}" class="btn btn-success">
                                        Добавить
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th># ID</th>
                                        <th>Заголовок</th>
                                        <th>Статус</th>
                                        <th style="text-align: center;">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($certificates as $item)
                                            <tr>
                                                <td>{{ $item->id }}.</td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    @if($item->public == true)
                                                        <span class="badge badge-success">Опубликован</span>
                                                    @else
                                                        <span class="badge badge-warning">Не опубликован</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('certificates.edit', ['id'=> $item->id]) }}" class="btn-actions"><i class="far fa-edit"></i></a>

                                                    <a class="actions"  data-toggle="modal" data-target="#modal-danger{{ $item->id }}" href="#">
                                                        <span class="trash"><i class="fas fa-trash-alt"></i></span>
                                                    </a>
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
                                                            <p>{{  $item->title ? $item->title : 'Данную лицензию или сертификат' }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('certificates.delete', ['id' => $item->id]) }}" class="btn btn-outline-light">Удалить</a>
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
                                {{ $certificates->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
