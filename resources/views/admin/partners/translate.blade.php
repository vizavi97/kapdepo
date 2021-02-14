@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать {{ $partner->title }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('partners.list')}}">Партнёры</a></li>
                        <li class="breadcrumb-item active">Редактировать партнёра</li>
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
                        <form action="{{ route('partners.edit' , ['id' => $partner->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Введите заголовок" value="{{ $partner->title }}" id="title" name="title">
                                </div>
                                <div class="callout callout-info">
                                    <label class="required">Изображение</label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Текущее изображение</label>
                                                <img src="/storage/{{ $partner->image }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="link" class="">Ссылка</label>
                                    <input type="text" class="form-control" value="{{ $partner->link }}" placeholder="Вставьте ссылку" id="link" name="link">
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="">Описание</label>
                                    <textarea type="text" class="form-control" placeholder="Описание" id="desc" name="desc">{{ $partner->desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" @if($partner->lang == 'ru') selected="selected" @endif> Русский </option>
                                        <option value="uz" @if($partner->lang == 'uz') selected="selected" @endif> Узбекский </option>
                                        <option value="en" @if($partner->lang == 'en') selected="selected" @endif> Английский </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  @if($partner->public == true) checked @endif name="publish" id="publish">
                                        <label class="form-check-label" for="publish">Опубликовать, как прайм </label>
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