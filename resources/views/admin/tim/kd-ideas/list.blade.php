@extends('admin.home')
@section('content')
  @if(session('message'))
    <script>
      $(function () {

        $(document).ready(function () {

          toastr.success('{{session('message')}}', 'kds', {timeOut: 5000})
        })
      });
    </script>
  @endif
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark">Список Портфелей</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item active">Список Портфелей</li>
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
                  <a href="{{ route('kd-ideas.create') }}" class="btn btn-success">
                    Добавить
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body p-0">
              @if(!$kds->isEmpty())
                <div class="table-responsive">
                  <table class="table m-0" style="min-height: 200px;">
                    <thead>
                    <tr>
                      <th>id</th>
                      <th>номер kd</th>
                      <th>Компания</th>
                      <th>Цена</th>
                      <th>Дата</th>
                      <th>кол-во</th>
                      <th>дивиденды</th>
                      <th>действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kds as $kd)
                      <tr>
                        <td>{{$kd->id}}</td>
                        <td>{{$kd->kd_number}}</td>
                        <th>{{$kd->getCompany->title}}</th>
                        <th>{{$kd->kd_price}}</th>
                        <th>{{$kd->date}}</th>
                        <th>{{$kd->share_count}}</th>
                        <th>{{$kd->box_dividends}}</th>
                        <td>
                          <div class="d-flex">
                            <a href="{{ route('kd-ideas.edit', ['id' => $kd->id]) }}"
                               class="btn btn-dark mr-2">изменить</a>
                            <form action="{{ route('kd-ideas.delete', ['id' => $kd->id]) }}" method="POST">
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
                <h4 class="text-center">Список Портфелей пуст</h4>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
