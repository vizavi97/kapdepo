@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Добавить облигацию</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('bonds.list')}}">Облигации</a></li>
            <li class="breadcrumb-item active">Добавить облигацию</li>
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
            <form action="{{ route('bonds.create') }}" method="post" enctype="multipart/form-data">
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
                  <label for="title" class="required">Название компании</label>
                  <input type="text" class="form-control" placeholder="Введите заголовок" id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="issuer" class="required">Issuer</label>
                  <input type="text" class="form-control" placeholder="Введите issuer" id="issuer" name="issuer">
                </div>
                {{----}}
                <div class="form-group">
                  <label for="issuer" class="required">Дата размещения</label>
                  <input type="text" class="form-control" placeholder="Дата размещения" id="date_posting"
                         name="date_posting">
                </div>
                {{----}}
                {{----}}
                <div class="form-group">
                  <label for="issuer" class="required">Дата погашения</label>
                  <input type="text" class="form-control" placeholder="Дата погашения" id="date_maturity"
                         name="date_maturity">
                </div>
                {{----}}
                {{----}}
                <div class="form-group">
                  <label for="issuer" class="required">Срок обращения</label>
                  <input type="text" class="form-control" placeholder="Срок обращения" id="term_circulation"
                         name="term_circulation">
                </div>
                {{----}}
                {{----}}
                <div class="form-group">
                  <label for="issuer" class="required">Номинал</label>
                  <input type="text" class="form-control" placeholder="Номинал" id="denomination" name="denomination">
                </div>
                {{----}}
                {{----}}
                <div class="form-group">
                  <label for="issuer" class="required">Количество ЦБ</label>
                  <input type="text" class="form-control" placeholder="Количество ЦБ" id="cb_count" name="cb_count">
                </div>
                {{----}}

                <div class="form-group">
                  <label class="required" for="price">Цена</label>
                  <input type="text" class="form-control" placeholder="Цена" id="price" name="price">
                </div>
                <div class="form-group">
                  <label class="required" for="percent">Процентная ставка</label>
                  <input type="text" class="form-control" placeholder="Процентная ставка" id="percent" name="percent">
                </div>
                <div class="callout callout-info">

                  <label class="required">Изображение</label>
                  <div class="form-group">
                    <label for="image" class="form-control name-image" style="cursor: pointer;"> <i
                          class="far fa-images"></i> Загрузить файл</label>
                    <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image"
                           name="image">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <img src="" class="prev-image" alt="" style="width: 200px;height: auto; object-fit: cover;">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="company_id">Компании рыночных данных</label>
                  <select class="form-control" id="company_id" name="company_id">
                    <option value="" selected="selected"> Выбрать</option>
                    @foreach($comps as $item)
                      <option value="{{ $item->id }}"> {{ $item->title }} </option>

                    @endforeach
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

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        // $('.preview').css('display' , 'block');

        reader.onload = function (e) {
          $('.prev-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#image").change(function () {
      readURL(this);
      var text = '';
      var test = $('#image').prop('files');
      // text = test[0].name;
      $('.name-image').text(test[0].name);
      // console.log(text);
    });

  </script>
@endsection
