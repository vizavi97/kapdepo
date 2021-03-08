@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Добавить сотрудника</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('start-trading.list')}}">Faq</a></li>
            <li class="breadcrumb-item active">Добавить Этап"</li>
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
            <form action="{{ route('start-trading.create') }}" method="post">
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
                  <input type="number" class="form-control" minlength="1" min="1" value="1" max="10" maxlength="2"
                         required placeholder="Введите позицию"
                         id="position" name="position">
                </div>
                <div class="form-group">
                  <label for="title" class="required">Вопрос</label>
                  <input type="text" class="form-control" required minlength="4" placeholder="Введите заголовок"
                         id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="text" class="required">Ответ</label>
                  <textarea type="text" class="form-control" required minlength="2" placeholder="Введите текст"
                            id="answer"
                            name="text"></textarea>
                </div>
                <div class="form-group">
                  <label for="language" class="required">Язык</label>
                  <select name="lang" class="form-control" required id="language">
                    <option value="ru" selected>Русский</option>
                    <option value="en">English</option>
                    <option value="uz">Uzbek</option>
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
