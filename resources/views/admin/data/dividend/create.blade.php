@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Добавить данные по дивидендам</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('dividend.list')}}">Дивиденды</a></li>
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
            <form action="{{ route('dividend.create') }}" method="post" enctype="multipart/form-data">
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
                  <label for="comp_id">Компания</label>

                  <select required name="company_id" class="form-control">
                    <option value="">Укажите компанию</option>
                    @foreach($comps as $item)
                      <option value="{{ $item->id }}"> {{ $item->title }}</option>

                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="year" class="required">Год</label>
                  <input required type="text" class="form-control" placeholder="Год" id="year" name="year">
                </div>

                <div class="form-group">
                  <label for="sum" class="required">Сумма</label>
                  <input required type="text" class="form-control" placeholder="Сумма" id="sum" name="sum">
                </div>
                <div class="form-group">
                  <label for="procent" class="required">%</label>
                  <input required type="text" class="form-control" placeholder="%" id="procent" name="procent">
                </div>
                <div class="form-group">
                  <label for="preference" class="required">По превелигированным акциям</label>
                  <input type="number" class="form-control" placeholder="Сумма" id="preference" name="preference">
                </div>
                <div class="form-group">
                  <label for="preferencePercent" class="required">% По превелигированным акциям</label>
                  <input type="number" class="form-control" placeholder="%" id="preferencePercent"
                         name="preferencePercent">
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
