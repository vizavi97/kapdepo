@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Перевод акции {{ $stock->lang }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('stocks.list')}}">Акции</a></li>
                        <li class="breadcrumb-item active">Перевод акции {{ $stock->lang }}</li>
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
                        <form action="{{ route('stocks.edit', $stock->id) }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Введите заголовок" value="{{ $stock->title }}" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="issuer" class="required">Эмитент</label>
                                    <input type="text" class="form-control" placeholder="Эмитент" value="{{ $stock->issuer }}" id="issuer" name="issuer">
                                </div>
                                <div class="form-group">
                                    <label for="isin" class="required">ISIN</label>
                                    <input type="text" class="form-control" placeholder="isin" value="{{ $stock->isin }}" id="isin" name="isin">
                                </div>
                                <div class="form-group">
                                    <label for="weight" class="required">Весовой коэффициент</label>
                                    <input type="text" class="form-control" placeholder="Весовой коэффициент" value="{{ $stock->weight }}" id="weight" name="weight">
                                </div>
                                <div class="callout callout-info">
                                    <label>Главное Изображение</label>
                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <img src="/storage/{{ $stock->image }}" alt="" class="img-test">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Описание</label>
                                    <textarea type="text" class="form-control" placeholder="Ссылка на страницу" id="desc" name="desc">{{ $stock->desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" @if($stock->lang == 'ru') selected="selected" @endif> Русский </option>
                                        <option value="uz" @if($stock->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($stock->lang == 'en') selected="selected" @endif> Английский </option>                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  @if($stock->public == true) checked @endif name="public" id="public">
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