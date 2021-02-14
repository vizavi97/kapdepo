@extends('admin.home')
@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Клиент', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Клиенты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Клиенты</li>
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
                                    <a href="{{ route('users.create') }}" class="btn btn-success">
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
                                        <th># КЗЛ</th>
                                        <th>Фамилия, Имя</th>
                                        <th>Номер договора</th>
                                        <th style="text-align: center;">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $client)
                                            <tr>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->surname . ' ' . $client->first_name }}</td>

                                                <td>{{ $client->agreement }}</td>
                                                <td style="text-align: center">
                                                    <a class="btn-actions" href="{{ route('users.edit', ['id'=> $client->id]) }}">
                                                        <span class="edit action"><i class="far fa-edit"></i></span>
                                                    </a>
                                                    <a class="actions" data-toggle="modal" data-target="#modal-danger{{ $client->id }}" href="#">
                                                        <span class="trash"><i class="fas fa-trash-alt"></i></span>
                                                    </a>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-danger{{ $client->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-danger">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Вы уверены, что хотите удалить ? </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{  $client->surname . ' ' . $client->first_name }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-outline-light">Удалить</a>
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