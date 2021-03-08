@extends('admin.home')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Редактировать компанию</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('data.list.comp')}}">Компании</a></li>
            <li class="breadcrumb-item active">Редактировать компанию</li>
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
            <form action="{{ route('data.edit.comp', $company->id) }}" method="post" enctype="multipart/form-data">
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
                  <input type="text" class="form-control" placeholder="Название" value="{{ $company->title }}"
                         id="title" name="title">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" @if($company->kdindex == true) checked
                           @endif  name="kdindex" id="kdindex">
                    <label class="form-check-label" for="kdindex">Kdindex</label>
                  </div>
                </div>
                <div class="my-2">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusRadio1" value="shares"
                           required
                        {{$company->status == "shares" ? "checked" : '' }}
                    >
                    <label class="form-check-label" for="statusRadio1">
                      Акции
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusRadio2" value="bonds"
                        {{$company->status == "bonds" ? "checked" : '' }}
                    >
                    <label class="form-check-label" for="statusRadio2">
                      Облигации
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusRadio3" value="shares_bonds"
                        {{$company->status == "shares_bonds" ?"checked" : '' }}
                    >
                    <label class="form-check-label" for="statusRadio3">
                      Акции и облигации
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="isin" class="required">Isin</label>
                  <input type="text" class="form-control" placeholder="Название" value="{{ $company->isin }}" id="isin"
                         name="isin">
                </div>
                <div class="form-group">
                  <label for="issuer" class="required">Issuer</label>
                  <input type="text" class="form-control" placeholder="Название" value="{{ $company->issuer }}"
                         id="issuer" name="issuer">
                </div>

                <div class="callout callout-info">

                  <label class="required">Главное Изображение</label>
                  <div class="form-group">

                    <div class="row">

                      <div class="col-md-3">
                        <label for="">Текущее изображение</label>
                        <img src="/storage/{{ $company->image }}" alt="" class="img-test">
                      </div>
                      <div class="col-md-3">
                        <label for="">Новое изображение</label>
                        <img src="" class="prev-image img-test" alt="">

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-file">
                      <label for="image" class="form-control name-image" style="cursor: pointer;"> <i
                            class="far fa-images"></i> Загрузить файл</label>
                      <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image"
                             name="image">
                    </div>
                  </div>

                </div>
                <div class="callout callout-info">
                  <h5>Данные по профилю</h5>
                  <div class="form-group">
                    <label for="body">Описание</label>
                    <textarea class="textarea" name="body"
                              id="body">{{ isset($company->info->desc) ? $company->info->desc : null }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="lang">Язык</label>
                    <select class="form-control" id="lang" name="lang" disabled>
                      <option value="ru" selected="selected"> Русский</option>
                    </select>
                    <input type="hidden" name="lang" value="ru">
                  </div>
                  <div class="form-group">
                    <label for="address" class="">Адрес</label>
                    <input type="text" class="form-control" placeholder="Название" id="address"
                           value="{{ isset($company->info->address) ? $company->info->address : null  }}"
                           name="address">
                  </div>
                  <div class="form-group">
                    <label for="phone" class="">Телефон</label>
                    <input type="text" class="form-control" placeholder="Название" id="phone"
                           value="{{isset( $company->info->phone) ?  $company->info->phone : null  }}" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="site" class="">Сайт</label>
                    <input type="text" class="form-control" placeholder="Название" id="site"
                           value="{{ isset($company->info->site) ?  $company->info->site : null   }}" name="site">
                  </div>
                  <div class="form-group">
                    <label for="sector" class="">Сектор (Sector)</label>
                    <input type="text" class="form-control" placeholder="Название" id="sector"
                           value="{{ isset($company->info->sector) ?  $company->info->sector : null   }}" name="sector">
                  </div>
                  <div class="form-group">
                    <label for="industry" class="">Промышленность (Industy) </label>
                    <input type="text" class="form-control" placeholder="Название" id="industry"
                           value="{{ isset($company->info->industry) ?  $company->info->industry : null }}"
                           name="industry">
                  </div>
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
  <style>
    .img-test {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
  </style>

  <script type="text/javascript">
    var editor = CKEDITOR.replace('body', {});

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
