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
            <li class="breadcrumb-item"><a href="{{route('faq.list')}}">Faq</a></li>
            <li class="breadcrumb-item active">Добавить вопрос</li>
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
            <form action="{{ route('faq.create') }}" method="post">
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
                  <label for="surname" class="required">Вопрос</label>
                  <input type="text" class="form-control" required minlength="4" placeholder="Введите Вопрос"
                         id="question" name="question">
                </div>
                <div class="form-group">
                  <label for="name" class="required">Ответ</label>
                  <textarea type="text" class="form-control" required minlength="2" placeholder="Введите Ответ"
                            id="answer"
                            name="answer"></textarea>
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
