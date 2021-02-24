@extends('admin.home')
@section('content')
  @if(session('message'))
    <script>
      $(function () {

        $(document).ready(function () {

          toastr.success('{{session('message')}}', 'faq', {timeOut: 5000})
        })
      });
    </script>
  @endif
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark">Список вопросов</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item active">FAQ</li>
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
            <div class="card-header d-flex p-2" style="background-color: rgba(0,0,0,.03);">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a href="{{ route('faq.create') }}" class="btn btn-success">
                    Добавить
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body p-0">
              @if(!$faqs->isEmpty())
                <div class="table-responsive">
                  <table class="table m-0" style="min-height: 200px;">
                    <thead>
                    <tr>
                      <th>id</th>
                      <th>Вопрос</th>
                      <th>Ответ</th>
                      <th>язык</th>
                      <th>действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faqs as $faq)
                      <tr>
                        <td>{{$faq->id}}</td>
                        <td><small>{{$faq->question}}</small></td>
                        <td><small>{{$faq->answer}}</small></td>
                        <td><small>{{$faq->lang}}</small></td>

                        <td>
                          <div class="d-flex">
                            <a href="{{ route('faq.edit', ['id' => $faq->id]) }}" class="btn btn-dark mr-2">изменить</a>
                            <form action="{{ route('faq.delete', ['id' => $faq->id]) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger">Удалить</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              @else
                <h4 class="text-center">Список вопросов пуст</h4>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
