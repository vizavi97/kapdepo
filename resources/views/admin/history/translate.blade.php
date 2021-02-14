@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Перевод истории {{ $story->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('history.list')}}">Истории</a></li>
                        <li class="breadcrumb-item active">Перевод {{ $story->lang }}</li>
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
                        <form action="{{ route('history.edit', ['id' => $story->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Введите заголовок" value="{{ $story->title }}" id="title" name="title">
                                    <input type="hidden" >
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Изображение</label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="/storage/{{ $story->image }}" alt="" style="width: 200px;height: auto; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="year" class="required">Год</label>
                                    <input type="text" class="form-control" placeholder="Год" value="{{ $story->year }}" id="year" name="year">
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="required">Описание</label>
                                    <textarea type="number" class="form-control" placeholder="Описание" id="desc" name="desc">{{ $story->desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" @if($story->lang == 'ru') selected="selected" @endif> Русский </option>
                                        <option value="uz" @if($story->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($story->lang == 'en') selected="selected" @endif> Английский </option>
                                    </select>
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