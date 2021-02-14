@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Перевод  {{ $tariff->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tariff.list')}}">Тарифы</a></li>
                        <li class="breadcrumb-item active">Перевод {{ $tariff->lang }}</li>
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
                        <form action="{{ route('tariff.edit', ['id' => $tariff->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Введите название" value="{{ $tariff->title }}" id="title" name="title">
                                </div>
                                    <div class="form-group">
                                        <label for="order">Порядок</label>
                                        <select name="order" id="order" class="form-control">
                                            <option value="1" {{ $tariff->order == 1 ? 'selected="selected"' : '' }} >1</option>
                                            <option value="2" {{ $tariff->order == 2 ? 'selected="selected"' : '' }} >2</option>
                                            <option value="3" {{ $tariff->order == 3 ? 'selected="selected"' : '' }} >3</option>
                                            <option value="4" {{ $tariff->order == 4 ? 'selected="selected"' : '' }} >4</option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="desc" class="required">Описание</label>
                                    <textarea type="text" class="form-control" placeholder="Введите описание" id="desc" name="desc">{{ $tariff->desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="comm" class="required">От</label>
                                    <input type="text" class="form-control" placeholder="Введите число" value="{{ $tariff->commission }}" id="comm" name="comm">
                                </div>
                                <div class="form-group">
                                    <label for="note">Примечание</label>
{{--                                    <input type="text" class="form-control" placeholder="Примечание" value="{{ $tariff->note }}" id="note" name="note">--}}
                                    <textarea type="text" class="form-control" placeholder="Примечание" id="note" name="note">{{ $tariff->note }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="uz" @if($tariff->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($tariff->lang == 'en') selected="selected" @endif> Английский </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($tariff->public == true) checked @endif name="public" id="public">
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
