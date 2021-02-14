@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить компанию</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('data.list.comp')}}">Компании</a></li>
                        <li class="breadcrumb-item active">Добавить компанию</li>
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
                        <form action="{{ route('data.create.comp') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title" class="required">Название компании</label>
                                    <input type="text" class="form-control" placeholder="Название" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="kdindex" id="kdindex">
                                        <label class="form-check-label" for="kdindex">Kdindex</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="isin" class="required">Isin</label>
                                    <input type="text" class="form-control" placeholder="Название" id="isin" name="isin">
                                </div>
                                <div class="form-group">
                                    <label for="issuer" class="required">Issuer</label>
                                    <input type="text" class="form-control" placeholder="Название" id="issuer" name="issuer">
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Изображение</label>
                                    <div class="form-group">
                                        <label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>
                                        <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src=""  class="prev-image" alt="" style="width: 200px;height: auto; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="callout callout-info">
                                    <h5>Данные по профилю</h5>
                                    <div class="form-group">
                                        <label for="body" class="">Описание</label>
                                        <textarea class="textarea" name="body" id="body" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="lang">Язык</label>
                                        <select class="form-control" id="lang" name="lang" disabled>
                                            <option value="ru" selected="selected"> Русский </option>
                                        </select>
                                        <input type="hidden" name="lang" value="ru">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="">Адрес</label>
                                        <input type="text" class="form-control" placeholder="Название" id="address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="">Телефон</label>
                                        <input type="text" class="form-control" placeholder="Название" id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="site" class="">Сайт</label>
                                        <input type="text" class="form-control" placeholder="Название" id="site" name="site">
                                    </div>
                                    <div class="form-group">
                                        <label for="sector" class="">Сектор (Sector)</label>
                                        <input type="text" class="form-control" placeholder="Название" id="sector" name="sector">
                                    </div>
                                    <div class="form-group">
                                        <label for="industry" class="">Промышленность (Industy) </label>
                                        <input type="text" class="form-control" placeholder="Название" id="industry" name="industry">
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
        var editor = CKEDITOR.replace( 'body', {

        } );
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
            readURL(this);
            var text  = '';
            var test = $('#image').prop('files');
            // text = test[0].name;
            $('.name-image').text(test[0].name);
            // console.log(text);
        });

    </script>
@endsection
