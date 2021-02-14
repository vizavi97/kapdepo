@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать {{ $new->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('new.list')}}">Новости</a></li>
                        <li class="breadcrumb-item active">Редактировать</li>
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
                        <form action="{{ route('new.edit', ['id' => $new->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title" class="required">Заголовок</label>
                                    <input type="text" class="form-control" placeholder="Введите заголовок" value="{{ $new->title }}" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="1" @if($new->category_id == 1) selected="selected" @endif> Мировые </option>
                                        <option value="2" @if($new->category_id == 2)  selected="selected" @endif> Узбекистана </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Краткое описание</label>
                                    <input type="text" class="form-control" name="desc" value="{{ $new->desc }}" id="desc" placeholder="Введите текст">
                                </div>
                                <div class="form-group">
                                    <label for="body" class="required">Описание</label>
                                    <textarea class="textarea" name="body" id="body" >
                                        {{ $new->body }}
                                    </textarea>
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Главное Изображение</label>
                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="">Текущее изображение</label>
                                                <img src="/storage/{{ $new->image }}" alt="" class="img-test">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Новое изображение</label>
                                                <img src=""  class="prev-image img-test" alt="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>
                                            <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="image">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" selected="selected"> Русский </option>
                                        <option value="uz"> Узбекский </option>
                                        <option value="en"> Английский </option>
                                    </select>
                                    <input type="hidden" name="lang" value="ru">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  @if($new->public == true) checked @endif name="publish" id="publish">
                                        <label class="form-check-label" for="publish">Опубликовать (Баннер)</label>
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
    <style>
        .img-test{
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.prev-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            readURL(this);
            var text  = '';
            var test = $('#image').prop('files');
            $('.name-image').text(test[0].name);
        });
        $(document).ready(function () {
            var count = 1;
            var editor = CKEDITOR.replace('body', {});
        });
    </script>
@endsection