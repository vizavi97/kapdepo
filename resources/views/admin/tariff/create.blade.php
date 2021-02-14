@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить тариф</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tariff.list')}}">Тарифы</a></li>
                        <li class="breadcrumb-item active">Добавить тариф</li>
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
                        <form action="{{ route('tariff.create') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title" class="required">Название тарифа</label>
                                    <input type="text" class="form-control" placeholder="Введите название" id="title" name="title">
                                </div>
                                    <div class="form-group">
                                        <label for="order">Порядок</label>
                                        <select name="order" id="order" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="desc" class="required">Описание</label>
                                    <textarea type="text" class="form-control" placeholder="Введите описание" id="desc" name="desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comm" class="required">От </label>
                                    <input type="text" class="form-control" placeholder="Введите число" id="comm" name="comm">
                                </div>
                                <div class="form-group">
                                    <label for="note">Примечание</label>
                                    <textarea type="text" class="form-control" placeholder="Примечание" id="note" name="note"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" selected="selected"> Русский </option>
                                    </select>
                                    <input type="hidden" name="lang" value="ru">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  checked name="public" id="public">
                                        <label class="form-check-label" for="public">Опубликовать</label>
                                    </div>
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
        $(document).ready(function () {
            var count = 1;
            var editor = CKEDITOR.replace( 'desc', {

            } );
            var editor_2 = CKEDITOR.replace( 'note', {

            } );
        });
    </script>
@endsection
