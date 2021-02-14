@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Перевод  {{ $banner->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('banner.list')}}">Баннеры</a></li>
                        <li class="breadcrumb-item active">Перевод {{ $banner->lang }}</li>
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
                        <form action="{{ route('banner.edit', ['id' => $banner->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Введите заголовок" value="{{ $banner->title }}" id="title" name="title">
                                    <input type="hidden" >
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Изображение</label>
                                    <div class="form-group">
                                        <img src="/storage/{{ $banner->path }}"  class="prev-image" style="width: 200px;height: auto; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="link">Ссылка</label>
                                    <input type="text" class="form-control" placeholder="Ссылка на страницу" value="{{ $banner->link }}" id="link" name="link">
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        {{--<option value="ru" @if($banner->lang == 'ru') selected="selected" @endif> Русский </option>--}}
                                        <option value="uz" @if($banner->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($banner->lang == 'en') selected="selected" @endif> Английский </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($banner->published == true) checked @endif name="publish" id="publish">
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

@endsection