@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Данные Клиента</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.list')}}">Клиенты</a></li>
                        <li class="breadcrumb-item active">Данные Клиента</li>
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
                        <form action="{{ route('users.edit', $client->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="surName" class="required">Фамилия</label>
                                    <input type="text" class="form-control" value="{{ $client->surname }}" placeholder="Введите фамилию" id="surName" name="surName">
                                </div>
                                <div class="form-group">
                                    <label for="firstName" class="required">Имя</label>
                                    <input type="text" class="form-control" value="{{ $client->first_name }}" placeholder="Введите имя" id="firstName" name="firstName">
                                </div>
                                <div class="form-group">
                                    <label for="lastName" class="required">Отчество</label>
                                    <input type="text" class="form-control" placeholder="Введите отчество" id="lastName" value="{{ $client->lastname }}" name="lastName">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="required">Номер телефона</label>
                                    <div style="position: relative">
                                        <span style="position: absolute; top:7px; left: 5px;">+998</span>
                                        <input style="padding-left: 36px;" class="form-control" type="text" id="phone" value="{{ $client->phone }}" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="required">E-mail</label>
                                    <input type="email" class="form-control" value="{{ $client->email }}" placeholder="Введите e-mail" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="kzl" class="required">Номер КЗЛ</label>
                                    <input type="text" class="form-control" value="{{ $client->name }}" placeholder="Номер счёта" id="kzl" name="kzl">
                                </div>
                                <div class="form-group">
                                    <label for="agreement" class="required">Номер договора</label>
                                    <input type="text" class="form-control" value="{{ $client->agreement }}" placeholder="Номер договора" id="agreement" name="agreement">
                                </div>
                                <div class="form-group">
                                    <label for="">Ключ</label>
                                    <input type="text" class="form-control" disabled value="{{ $client->value }}">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection