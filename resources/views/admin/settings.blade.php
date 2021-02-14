@extends('admin.home')
@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Настройки', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Настройки</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Настройки</li>
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
                        <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="sitename" class="required">Название сайта</label>
                                    <input type="text" class="form-control" placeholder="Введите заголовок" value="{{ $setting->sitename }}" id="sitename" name="sitename">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="required">Телефон</label>
                                    <input type="text" class="form-control" placeholder="Телефон" value="{{ $setting->phone }}" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="required">Почта e-mail</label>
                                    <input type="email" class="form-control" placeholder="Э-л почта" value="{{ $setting->email }}" id="email" name="email">
                                </div>
                                <label class="required">Файл тарифы для юридических лиц</label>
                                <div class="form-group">
                                    <label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> {{ isset($setting->file) ? $setting->file : 'Загрузить файл'  }} </label>
                                    <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="file">
                                </div>
                                <div class="callout callout-info">
                                    <div class="form-group">
                                        <label for="address_ru" class="required">Адресс (RU)</label>
                                        <input type="text" class="form-control" placeholder="Адрес" value="{{ $setting->address_ru }}" id="address_ru" name="address_ru">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_uz" class="required">Адресс (UZ)</label>
                                        <input type="text" class="form-control" placeholder="Адрес" value="{{ $setting->address_uz }}" id="address_uz" name="address_uz">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_en" class="required">Адресс (EN)</label>
                                        <input type="text" class="form-control" placeholder="Адрес" value="{{ $setting->address_en }}" id="address_en" name="address_en">
                                    </div>
                                </div>
                                <div class="callout callout-info">
                                    <div class="form-group">
                                        <label for="foot_ru" class="required">Подвал текст (RU)</label>
                                        <textarea class="form-control" name="foot_ru"  id="foot_ru">{{ $setting->foot_ru }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="foot_uz" class="required">Подвал текст (UZ)</label>
                                        <textarea class="form-control" name="foot_uz"   id="foot_uz">{{ $setting->foot_uz }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="foot_en" class="required">Подвал текст (EN)</label>
                                        <textarea class="form-control" name="foot_en"   id="foot_en">{{ $setting->foot_en }}</textarea>
                                    </div>
                                </div>
                                <div class="callout callout-info">
                                    <div class="form-group">
                                        <label for="facebook"><i class="fab fa-facebook-square"></i> Facebook</label>
                                        <input type="text" class="form-control" placeholder="Ссылка на страницу" value="{{ $socials->facebook }}" id="facebook" name="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">  <i class="fab fa-linkedin-in"></i> LinkedIn</label>
                                        <input type="text" class="form-control" placeholder="Ссылка на страницу" value="{{ $socials->twitter }}" id="twitter" name="twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram"><i class="fab fa-instagram"></i> Instagram</label>
                                        <input type="text" class="form-control" placeholder="Ссылка на страницу" value="{{ $socials->instagram }}" id="instagram" name="instagram">
                                    </div>
                                    <div class="form-group">
                                        <label for="google"> <i class="fab fa-telegram-plane"></i> Telegram </label>
                                        <input type="text" class="form-control" placeholder="Ссылка на страницу" value="{{ $socials->google }}" id="google" name="google">
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
    <script type="text/javascript">
        $(document).ready(function () {
            var count = 1;
            var editor_ru = CKEDITOR.replace('foot_ru', {});
            var editor_uz = CKEDITOR.replace('foot_uz', {});
            var editor_en = CKEDITOR.replace('foot_en', {});
        });
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
            var text  = '';
            var test = $('#image').prop('files');
            // text = test[0].name;
            $('.name-image').text(test[0].name);
            // console.log(text);
        });

    </script>
@endsection
