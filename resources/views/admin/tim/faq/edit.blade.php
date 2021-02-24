@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Редактировать Faq - {{$faq->lang}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('faq.list')}}">Список Часто задаваемых вопросов</a></li>
            <li class="breadcrumb-item active">Редактировать Faq - {{$faq->lang}}</li>
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
            <form action="{{ route('faq.edit', ['id' => $faq->id]) }}" method="post" enctype="multipart/form-data">
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
                  <label for="question" class="required">вопрос</label>
                  <input type="text" class="form-control" required placeholder="Введите вопрос"
                         value="{{ $faq->question }}" id="question" name="question">
                </div>
                <div class="form-group">
                  <label for="answer" class="required">Ответ</label>
                  <textarea
                      class="form-control" placeholder="Введите Ответ" required id="answer"
                      name="answer">{{ $faq->answer }}</textarea>
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
