@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить Analytics</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('analytics.list')}}">Analytics</a></li>
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
                        <form action="{{ route('analytics.create') }}" method="post" enctype="multipart/form-data">
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

                                <div class="callout callout-info">
                                    <div class="form-group">
                                        <label for="name" class="required">ФИО</label>
                                        <input type="text" class="form-control" placeholder="name" id="name" name="name">
                                    </div>
                                    <label class="required">Изображение</label>
                                    <div class="form-group">
                                        <label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>
                                        <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="image">
                                    </div>
                                    <label class="required">Файл PDF</label>
                                    <div class="form-group">
                                        <label for="pdf" class="form-control name-pdf" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>
                                        <input style="display: none;" type="file" class="form-control" placeholder="Название" id="pdf" name="pdf">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="desc" class="required">Описание</label>
                                    <textarea type="text" class="form-control" placeholder="Ссылка на страницу" id="desc" name="desc"></textarea>
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

    <script type="text/javascript">
        $(document).ready(function (){
            var editor = CKEDITOR.replace( 'desc', {} );


        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // $('.preview').css('display' , 'block');

                reader.onload = function (e) {
                    $('.prev-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            // readURL(this);
            var text  = '';
            var test = $('#image').prop('files');
            $('.name-image').text(test[0].name);
        });
        $("#pdf").change(function () {
            // readURL(this);
            var text  = '';
            var test = $('#pdf').prop('files');
            $('.name-pdf').text(test[0].name);
        });

    </script>
@endsection
