@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить руководитея</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('data.list.key')}}">Список</a></li>
                        <li class="breadcrumb-item active">Добавить руководителя</li>
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
                        <form action="{{ route('data.create.key') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="company" class="required">Компания</label>
                                    <select required name="company" id="company" class="form-control">
                                        <option value=""> Выбрать компанию</option>
                                        @foreach($comps as $comp)
                                            <option value="{{ $comp->id }}">{{ $comp->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="required">ФИО</label>
                                    <input required type="text" class="form-control" placeholder="ФИО" id="name" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="issuer" class="required">Позиция</label>
                                    <input type="text" required class="form-control" placeholder="Название" id="position" name="position">
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" selected="selected"> Русский </option>
                                    </select>
                                    <input type="hidden" name="lang" value="ru">
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
