@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Редактировать Faq - {{$step->lang}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('faq.list')}}">Список Часто задаваемых вопросов</a></li>
            <li class="breadcrumb-item active">Редактировать Faq - {{$step->lang}}</li>
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
            <form action="{{ route('start-trading.edit', ['id' => $step->id]) }}" method="post"
                  enctype="multipart/form-data">
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
                  <label for="position" class="required">Позиция</label>
                  <input type="number" class="form-control" minlength="1" min="1" value="{{$step->position}}" max="10"
                         maxlength="2"
                         required placeholder="Введите позицию"
                         id="position" name="position">
                </div>
                <div class="form-group">
                  <label for="title" class="required">Вопрос</label>
                  <input type="text" class="form-control" required minlength="4" placeholder="Введите заголовок"
                         value='{{$step->title}}' id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="text" class="required">Ответ</label>
                  <textarea type="text" class="form-control" required minlength="2" placeholder="Введите текст"
                            id="answer"
                            name="text">{{$step->text}}</textarea>
                </div>
                <div class="form-group">
                  <label for="language" class="required">Язык</label>
                  <select name="lang" class="form-control" required id="language">
                    <option value="ru" {{$step->lang == "ru" ? "selected" : ''}}>Русский</option>
                    <option value="en" {{$step->lang == "en" ? "selected" : ''}}>English</option>
                    <option value="uz" {{$step->lang == "uz" ? "selected" : ''}}>Uzbek</option>
                  </select>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Изменить</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
