@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Перевод данных сотрудника</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('team.list')}}">Наша команда</a></li>
                        <li class="breadcrumb-item active">Перевод {{ $person->lang }}</li>
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
                        <form action="{{ route('team.edit', ['id' => $person->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="surname" class="required">Фамилия</label>
                                    <input type="text" class="form-control" placeholder="Введите фамилию" value="{{ $person->surname }}" id="surname" name="surname">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="required">Имя</label>
                                    <input type="text" class="form-control" placeholder="Введите имя" value="{{ $person->name }}" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="patronymic">Отчество</label>
                                    <input type="text" class="form-control" placeholder="Введите отчество" value="{{ $person->patronymic }}" id="patronymic" name="patronymic">
                                </div>
                                <div class="form-group">
                                    <label for="position" class="required">Должность</label>
                                    <input type="text" class="form-control" placeholder="Введите должность" value="{{ $person->position }}" id="position" name="position">
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="required">Описание</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10">{{ $person->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="order" class="required">Уровень позиции</label>
                                    <select name="order" id="order" class="form-control">
                                        <option  selected="selected">Выбрать</option>
                                        @switch($person->order)
                                            @case(1)
                                            <option value="1" selected="selected">Уровень 1</option>
                                            <option value="2">Уровень 2</option>
                                            <option value="3">Уровень 3</option>
                                            @break
                                            @case(2)
                                            <option value="1">Уровень 1</option>
                                            <option value="2" selected="selected">Уровень 2</option>
                                            <option value="3">Уровень 3</option>
                                            @break
                                            @case(3)
                                            <option value="1">Уровень 1</option>
                                            <option value="2">Уровень 2</option>
                                            <option value="3" selected="selected">Уровень 3</option>
                                            @break
                                        @endswitch

                                    </select>
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Изображение</label>
                                    {{--<div class="form-group">--}}
                                        {{--<label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>--}}
                                        {{--<input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="image">--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-3">
                                                {{--<label for="">Текущее изображение</label>--}}
                                                <img src="/storage/{{ $person->photo }}" alt="" style="width: 200px;height: auto; object-fit: cover;">
                                            </div>
                                            {{--<div class="col-md-3">--}}
                                                {{--<label for="">Новое изображение</label>--}}
                                                {{--<img src=""  class="prev-image" alt="" style="width: 200px;height: auto; object-fit: cover;">--}}

                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Контакты :</label>
                                    <div class="form-group">
                                        <label for="e-mail" class="required">E-mail</label>
                                        <input type="email" class="form-control" placeholder="Введите e-mail" value="{{ $person->email }}"  id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_one" class="required">Тел. 1</label>
                                        <input type="text" class="form-control" placeholder="Введите номер" value="{{ $person->phone_one }}"  id="phone_one" name="phone_one">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_two">Тел. 2</label>
                                        <input type="text" class="form-control" placeholder="Введите номер" value="{{ $person->phone_two }}"  id="phone_two" name="phone_two">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        @switch($person->lang)
                                            @case('ru')
                                            <option value="ru" selected="selected"> Русский </option>
                                            <input type="hidden" name="lang" value="ru">
                                            @break
                                            @case('uz')
                                            <option value="uz" selected="selected"> Узбексий </option>
                                            <input type="hidden" name="lang" value="uz">
                                            @break
                                            @case('en')
                                            <option value="en" selected="selected"> Английский </option>
                                            <input type="hidden" name="lang" value="en">
                                            @break
                                        @endswitch
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($person->public == true) checked @endif  name="publish" id="publish">
                                        <label class="form-check-label" for="publish">Опубликовать</label>
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
            var editor = CKEDITOR.replace('desc', {});
        });
        {{--function readURL(input) {--}}
            {{--if (input.files && input.files[0]) {--}}
                {{--var reader = new FileReader();--}}
                {{--// $('.preview').css('display' , 'block');--}}

                {{--reader.onload = function (e) {--}}
                    {{--$('.prev-image').attr('src', e.target.result);--}}
                {{--}--}}

                {{--reader.readAsDataURL(input.files[0]);--}}
            {{--}--}}
        {{--}--}}

        {{--$("#image").change(function () {--}}
            {{--readURL(this);--}}
            {{--var text  = '';--}}
            {{--var test = $('#image').prop('files');--}}
            {{--// text = test[0].name;--}}
            {{--$('.name-image').text(test[0].name);--}}
            {{--// console.log(text);--}}
        {{--});--}}

    </script>
@endsection
