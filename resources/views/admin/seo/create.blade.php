@extends('admin.home')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить seo для страницы</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('seo.list')}}">Seo страницы</a></li>
                        <li class="breadcrumb-item active">Добавить seo</li>
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
                        <form action="{{ route('seo.create') }}" method="post" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="keywords" class="required">Ключевые слова</label>
                                    <input type="text" class="form-control" placeholder="Введите заголовок" id="keywords" name="keywords">
                                </div>
                                <div class="form-group">
                                    <label for="link">Ссылка</label>
                                    <input type="text" class="form-control" placeholder="Ссылка на страницу" id="link" name="link">
                                </div>
                                <div class="form-group">
                                    <label for="lang">Язык</label>
                                    <select class="form-control" id="lang" name="lang" disabled>
                                        <option value="ru" selected="selected"> Русский </option>
                                    </select>
                                    <input type="hidden" name="lang" value="ru">
                                </div>
                                <div class="form-group">
                                    <label for="page">Страница</label>
                                    <select name="page" id="page" class="form-control">
                                        <option value="{{ Str::after(route('home'), route('home'))  }}">Главная</option>
                                        <option value="{{ Str::after(route('about.page'), route('home')) }}">О нас</option>
                                        <option value="{{ Str::after(route('team.page'), route('home'))  }}">О нас - Наша команда</option>
                                        <option value="{{ Str::after(route('team.resume'), route('home'))  }}">О нас - Вступить в команду</option>
                                        <option value="{{ Str::after(route('contacts.page'), route('home'))  }}">Контакты</option>
                                        <option value="{{ Str::after(route('news.page'), route('home')) }}">Новости</option>
                                        <option value="{{ Str::after(route('private.page'), route('home'))  }}">Частным клиентам</option>
                                        <option value="{{ Str::after(route('corporate.page'), route('home')) }}">Корпоративным клиентам</option>
                                        <option value="{{ Str::after(route('kd.page'), route('home')) }}">Kd - IDEAS</option>
                                        <option value="{{ Str::after(route('partners.page'), route('home')) }}">Партнёры</option>
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

@endsection