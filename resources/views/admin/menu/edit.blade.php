@extends('admin.home')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать {{ $item->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('menu.list')}}">Меню</a></li>
                        <li class="breadcrumb-item active">Добавить пункт</li>
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
                        <form action="{{ route('menu.edit', ['id' => $item->id]) }}" method="post">
                            @csrf
                            {{--<div class="card-header d-flex p-2" style="background-color: rgba(0,0,0,.03);">--}}

                            {{--</div>--}}
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
                                    <input type="text" class="form-control" value="{{ $item->title }}" placeholder="Название" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle" >Подзаголовок</label>
                                    <input type="text" class="form-control" value="{{ $item->subtitle }}" placeholder="Название" id="subtitle" name="subtitle">
                                </div>
                                <div class="form-group">
                                    <label for="body" >Описание</label>
                                    <textarea class="form-control" id="body" name="body">{{ $item->body }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="path">Путь (ссылка)</label>
                                    <input type="text" class="form-control" value="{{ $item->path }}" placeholder="Название" id="path" name="path">
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang">
                                        @switch($item->lang)
                                            @case('ru')
                                                <option value="ru" selected="selected"> Русский </option>
                                            @break
                                            @case('en')
                                                <option value="en" selected="selected"> Английский </option>
                                            @break
                                            @case('uz')
                                                <option value="uz" selected="selected"> Узбекский </option>
                                            @break

                                        @endswitch
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @if($item->published == true)  checked @endif type="checkbox"  name="publish" id="publish">
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