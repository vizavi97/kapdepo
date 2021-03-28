@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Добавить Портфель</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('kd-ideas.list')}}">Портфели</a></li>
            <li class="breadcrumb-item active">Добавить Портфель</li>
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
            <form action="{{ route('kd-ideas.create') }}" method="post">
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
                  <label for="company_id" class="required">Компания</label>
                  <select name="company_id" class="form-control" required id="company_id">
                    <option value="">Выберете компанию</option>
                    @foreach ($comps as $comp)
                      <option value="{{$comp->id}}">{{$comp->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="share_count" class="required">Кол-ЦБ</label>
                  <input type="number" class="form-control" min="0" required placeholder="Кол-ЦБ"
                         id="share_count" name="share_count">
                </div>
                <div class="form-group">
                  <label for="kd_number" class="required">Номер портфеля</label>
                  <input type="number" class="form-control" min="0" required placeholder="Номер портфеля"
                         id="kd_number" name="kd_number">
                </div>
                <div class="form-group">
                  <label for="kd_price" class="required">Цена открытия</label>
                  <input type="number" class="form-control" min="0" required placeholder="Цена открытия"
                         id="kd_price" name="kd_price">
                </div>
                <div class="form-group">
                  <label for="box_dividends" class="required">Ожидаемые дивиденды</label>
                  <input type="number" class="form-control" min="0" required placeholder="Ожидаемые дивиденды"
                         id="box_dividends" name="box_dividends">
                </div>
                <div class="form-group">
                  <label for="date" class="required">Дата</label>
                  <input type="text" class="form-control" required placeholder="Введите Дату"
                         id="date" name="date">
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
