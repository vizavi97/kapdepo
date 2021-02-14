@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Перевод {{ $branch->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('branches.list')}}">Филиалы</a></li>
                        <li class="breadcrumb-item active">Перевод {{ $branch->lang }}</li>
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
                        <form action="{{ route('branches.edit', ['id' => $branch->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title" class="required">Название филиала</label>
                                    <input type="text" class="form-control" placeholder="Введите название" value="{{ $branch->title }}" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="required">Адрес</label>
                                    <input type="text" class="form-control" placeholder="Введите адрес" value="{{ $branch->address }}" id="address" name="address">
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Контакты :</label>
                                    <div class="form-group">
                                        <label for="phone_one" class="required">Тел. 1</label>
                                        <input type="text" class="form-control" placeholder="Введите номер" value="{{ $branch->phone_one }}" id="phone_one" name="phone_one">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_two" >Тел. 2</label>
                                        <input type="text" class="form-control" placeholder="Введите номер" value="{{ $branch->phone_two }}" id="phone_two" name="phone_two">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="latitude" class="required">Широта</label>
                                    <input type="text" class="form-control" placeholder="Введите данные" value="{{ $branch->latitude }}" id="latitude" name="latitude">
                                </div>
                                <div class="form-group">
                                    <label for="longitude" class="required">Долгота</label>
                                    <input type="text" class="form-control" placeholder="Введите данные" value="{{ $branch->longitude }}" id="longitude" name="longitude">
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="uz" @if($branch->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($branch->lang == 'en') selected="selected" @endif> Английский </option>
                                    </select>
                                    <input type="hidden" name="lang" value="ru">
                                </div>
                                <div class="form-group">
                                    <label for="link" class="required">Ссылка</label>
                                    <input type="text" class="form-control" placeholder="Вставьте ссылку" value="{{ $branch->link }}" id="link" name="link">
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

    <script type="text/javascript">

    </script>
@endsection