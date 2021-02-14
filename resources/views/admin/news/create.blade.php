@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить новость</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('new.list')}}">Новости</a></li>
                        <li class="breadcrumb-item active">Добавить новость</li>
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
                        <form action="{{ route('new.create') }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Введите заголовок" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="1"> Мировые </option>
                                        <option value="2"> Узбекистана </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Краткое описание</label>
                                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Введите текст">
                                </div>
                                <div class="form-group">
                                    <label for="body" class="required">Описание</label>
                                    <textarea class="textarea" name="body" id="body" ></textarea>
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Главное Изображение</label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src=""  class="prev-image" alt="" style="width: 200px;height: auto; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file" style="width: 88%;">
                                            <label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>
                                            <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="image">
                                        </div>
{{--                                        <button type="button" class="add btn btn-primary float-right">Добавить</button>--}}
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
                                        <input class="form-check-input" type="checkbox"  checked name="publish" id="publish">
                                        <label class="form-check-label" for="publish">Опубликовать (Баннер)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Сохранить</button>
                            </div>

                        </form>
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
                                var editor = CKEDITOR.replace( 'body', {

                                } );

                                $('.add').on('click',function () {
                                    if(count < 4){
                                        count++;

                                        $('<div>').attr('class', 'form-group form-'+count).appendTo('.callout');
                                        $('<div>').attr('class', 'custom-file custom-block-'+count).css('width', '88%').appendTo('.form-'+count);
                                        $('<button>').attr({
                                            type: 'button',
                                            class: 'rem btn btn-danger float-right',
                                        }).text('Убрать').appendTo('.form-'+count);



                                        $('<label>').attr({
                                            'class': 'custom-file-label',
                                            'for': 'foo'+count,
                                        }).css('cursor', 'pointer').text('Выбрать файл').appendTo('.custom-block-'+count);
                                        $('<input>').attr({
                                            type: 'file',
                                            id: 'foo'+count,
                                            name: 'files[]',
                                            value: 'bar',
                                            class:'fl-in added-file'
                                        }).css('display','none').appendTo('.custom-block-'+count);
                                    }

                                });

                                $(document).on('click','.rem',function () {
                                    if(count > 1){
                                        $(this).parent().remove();
                                        count--;
                                    }
                                });

                                $(document).on('change','.added-file', function () {
                                    console.log('yes');
                                    var rar = $(this).prop('files');
                                    console.log($(this).parent().find('label'));
                                    $(this).parent().find('label').text(rar[0].name);
                                });
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
