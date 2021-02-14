@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать analysis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('data.list.analysis')}}">Список</a></li>
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
                        <form action="{{ route('data.edit.analysis', $analysis->id) }}" method="post" enctype="multipart/form-data">
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
                                            <option @if($comp->id == $analysis->company_id) selected="selected" @endif value="{{ $comp->id }}">{{ $comp->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <a target="_blank" href="/storage/{{ $analysis->image }}">Файл</a>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="required">Название</label>
                                    <input required type="text" class="form-control" placeholder="Название" id="title" value="{{ $analysis->title }}" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="body" class="required">Описание</label>
                                    <textarea required class="textarea" name="body" id="body" >{{ $analysis->desc }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" @if($analysis->lang == 'ru') selected="selected" @endif> Русский </option>
                                        <option value="uz" @if($analysis->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($analysis->lang == 'en') selected="selected" @endif> Английский </option>
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
        var editor = CKEDITOR.replace( 'body', {

        } );

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
