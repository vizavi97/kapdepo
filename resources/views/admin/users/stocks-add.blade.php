@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить новую акцию</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.stocks.list')}}">Данные по акциям</a></li>
                        <li class="breadcrumb-item active">Добавить Акцию</li>
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
                        <form action="{{ route('users.stocks.add') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title" class="required">Название</label>
                                    <input type="text" class="form-control" placeholder="Введите название" id="title" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="isin" class="required">ISIN</label>
                                    <input type="text" class="form-control" placeholder="Введите isin" id="isin" name="isin">
                                </div>

                                <div class="form-group">
                                    <label for="price" class="required">Цена</label>
                                    <input type="text" class="form-control" placeholder="00.00" id="price" name="price">
                                </div>
                                <div class="callout callout-info">

                                    <label>Изображение</label>
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